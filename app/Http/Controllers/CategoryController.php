<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{


    public function index(){

        $categories = Category::with('subcategories')->get();

        return view('admin.category', ['categories' => $categories]);
    }



    public function storeCategory(Request $request)
{
    // Validate request data
    $messages = [
        'required' => 'The :attribute field is required.', // Generic message for required rule
        'catname.required' => 'The category field is required.', // Custom message for required rule applied to 'catname' field
        'string' => 'The :attribute must be a string.',
        'max' => 'The :attribute must not be greater than :max characters.',
        'unique' => 'The :attribute has already been taken.',
    ];

    // Validate request data with custom messages
    $validator = Validator::make($request->all(), [
        'catname' => 'required|string|max:255|unique:categories,catname',
    ], $messages);
    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
        // return redirect()->back()->with(['error' => 'Category created successfully']);
    }

    $imageUrl = $this->uploadImageAndGetLink($request);


    // Save category
    $category = Category::create(['catname' => $request->catname,  'cat_image' => $imageUrl,]);

    // Return a success response
    return redirect()->back()->with(['success' => 'Category created successfully']);
}



    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->catname = $request->input('catname');
        if ($request->hasFile('image')) {
            $imageUrl = $this->uploadImageAndGetLink($request);
            $category->cat_image = $imageUrl;
        }
        $category->save();

        return redirect()->back()->with('success', 'Category updated successfully');
    }


public function delete($id)
{
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->back()->with('success', 'Category deleted successfully');
}



public function insertSubcategory(Request $request)
{
    // Validate request data
    $request->validate([
        'category_name' => 'required|string|max:255', // Assuming you receive the category name in the request
        'subcategory_name' => 'required|string|max:255',
    ]);

    // Retrieve category by name
    $category = Category::where('catname', $request->category_name)->first();

    if (!$category) {
        return redirect()->back()->withErrors(['error' => 'Category not found']);
    }

    // Create subcategory
    $subcategory = new SubCategory();
    $subcategory->name = $request->subcategory_name;
    $subcategory->category_id = $category->id;
    $subcategory->save();

    return redirect()->back()->with('success', 'Record created successfully');
}


public function deleteSubcategory($id)
{
    $category = SubCategory::findOrFail($id);
    $category->delete();
    return redirect()->back()->with('success', 'Record deleted successfully');
}


        public function uploadImageAndGetLink($request): ?string
        {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name for the image
                $imagePath = $image->storeAs('public/uploads', $imageName);
                $imageUrl = asset('storage/uploads/' . $imageName);
                return $imageUrl;
            } else {
                // Handle case where no image was uploaded
                return null;
            }
        }




}
