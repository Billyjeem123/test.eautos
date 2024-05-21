<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function showBlog()
    {

        return view('admin.blog.index');
    }


    public function create_blog(Request $request)
    {
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




    public function delete_blog($id): \Illuminate\Http\RedirectResponse
    {
        $blog =  Blog::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public  function  blog_details($id)
    {
        $blog =  Blog::findOrFail($id);

        return view('admin.blog.details', ['blog' => $blog]);



    }
}

