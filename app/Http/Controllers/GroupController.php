<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    public function index($id)
    {
        // Find the specific group or fail if not found
        $group = Group::findOrFail($id);

        // Fetch other groups excluding the current one
        $otherGroups = Group::where('id', '!=', $id)->paginate(3);

        // Fetch posts with likes for the specified group
        $posts = Post::with('likes')
            ->where('group_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(1);

        // Increment the view count for each post
        foreach ($posts as $post) {
            if ($post->views < 500) {
                $post->views = 500;
            }
            $post->views += 1; // Increment the view count
            $post->save(); // Save the updated view count to the database
        }

        // Pass the data to the view
        return view('home.groups.index', compact('group', 'otherGroups', 'posts'));
    }



    public function group_activities()
    {

        return view('home.groups.members');

    }


    public function create_posts(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'contents' => 'required|string',
                'group_id' => 'required|exists:groups,id',
            ]);

            // Create post data
            $post = new Post();
            $post->content = $request->contents;
            $post->group_id = $request->group_id;

            // Handle anonymous posts
            if (empty($request->user_id)) {
                $post->user_id = null;
            } else {
                $post->user_id = $request->user_id;
            }

            $post->save();

            return redirect()->back()->with(['success' => 'Post created successfully.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $e->errors()], 200);
        } catch (\Exception $e) {
            // Log the error message
            return redirect()->back()->with(['error' => 'Failed to create post.'. $e->getMessage()]);
        }
    }



    public function join(Group $group)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is already a member of the group
        if ($group->users()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You are already a member of this group.');
        }

        // Attach the user to the group
        $group->users()->attach($user->id);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Successfully joined the group.');
    }




}
