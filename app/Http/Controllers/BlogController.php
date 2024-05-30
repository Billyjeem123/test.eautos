<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
    //
    public function showBlog()
    {

        return view('admin.blog.index');
    }



    public function showGroup()
    {

        return view('admin.group.index');
    }



    public function create_group(Request $request)
    {
        try {
            // Validate request data
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:2048',
            ]);

            // Handle the image upload
            $imageLink = $this->uploadBlogImageAndGetLink($request);

            // Save blog post data
            $group = new Group();
            $group->title = $request->title;
            $group->description = $request->description;
            $group->image = $imageLink;
            $group->save();

            // Attach the user who created the group to the group
            $user = auth()->user();
            $group->users()->attach($user->id);



            return response()->json(['success' => true, 'message' => 'Group created successfully.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json(['success' => false, 'message' => 'Validation failed.', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Failed to create group: ' . $e->getMessage());

            // Return error response
            return response()->json(['success' => false, 'message' => 'Failed to create group.', 'error' => $e->getMessage()], 500);
        }
    }




    public function create_blog(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Handle the image upload
            $imageLink = $this->uploadBlogImageAndGetLink($request);
            $role = auth()->user()->role == "admin" ? 1 : 0;

            // Save blog post data
            $blog = new Blog();
            $blog->title = $request->title;
            $blog->desc = $request->description;
            $blog->image = $imageLink;
            $blog->user_id = auth()->user()->id;
            $blog->is_active = $role;
            $blog->save();

            return response()->json(['success' => true, 'message' => 'Blog post uploaded successfully.']);
        } catch (\Exception $e) {
            // Log the error or return an appropriate error response
            return response()->json(['success' => false, 'message' => 'An error occurred while uploading the blog post ' .  $e->getMessage()], 500);
        }
    }

    public function update_blog(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->title = $request->title;
        $blog->desc = $request->desc;

        if ($request->hasFile('image')) {
            // Handle the image upload
            $imageLink = $this->uploadBlogImageAndGetLink($request);
            $blog->image = $imageLink;
        }

        $blog->save();

        return response()->json(['success' => true, 'message' => 'Blog post updated successfully.']);
    }


    public function uploadBlogImageAndGetLink($request): string
    {
        $imageUrl = '';

        if ($request->hasFile('image')) { // Note: 'image' singular, for a single file
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name for the image
            $imagePath = $image->storeAs('public/uploads', $imageName);
            $imageUrl = asset('storage/uploads/' . $imageName);
        } else {
            // Handle case where no image was uploaded
            // You might want to throw an exception or return a default image URL
            // throw new \Exception("No image uploaded");
        }

        return $imageUrl;
    }

    public function getAllBlogs()
    {
        $blogs = Blog::with('user')->orderBy('id', 'desc')->get();

        return view('admin.blog.blog-list', ['blogs' => $blogs]);
    }


    public function getAllGroups()
    {
        $groups = Group::orderBy('id', 'desc')->get();
        return view('admin.group.group-list', ['groups' => $groups]);
    }



    public function delete_blog($id): \Illuminate\Http\RedirectResponse
    {
        $blog =  Blog::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }


    public function delete_group($id): \Illuminate\Http\RedirectResponse
    {
        $blog =  Group::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public  function  blog_details($id)
    {
        $blog =  Blog::findOrFail($id);

        return view('admin.blog.details', ['blog' => $blog]);



    }
}

