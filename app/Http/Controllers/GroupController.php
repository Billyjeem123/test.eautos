<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    public function index($id)
    {
        // Find the specific group or fail if not found
        $group = Group::findOrFail($id);

        // Fetch other groups excluding the current one
        $otherGroups = Group::where('id', '!=', $id)->paginate(3);


        $posts = Post::with('likes')
            ->where('group_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(1);



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
                'anonymous' => 'nullable',
                'user_id' => 'nullable'
            ]);

            // Create post data
            $post = new Post();
            $post->content = $request->contents;
            $post->group_id = $request->group_id;
            $post->user_id = 1 ?? 'null';// Handle anonymous posts
            $post->save();

            return response()->json(['success' => true, 'message' => 'Post created successfully.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $e->errors()], 200);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Failed to create post: ' . $e->getMessage());

            // Return error response
            return response()->json(['success' => false, 'message' => 'Failed to create post.', 'error' => $e->getMessage()], 200);
        }
    }



}
