<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    
    public function index(){

        $brands = Brand::all();

        return view('admin.brand', ['brands' => $brands]);
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }



    public function store(Request $request)
    {
        // Define custom error messages
        $messages = [
            'required' => 'The :attribute field is required.', // Generic message for required rule
            'brand_name.required' => 'The brand name field is required.', // Custom message for required rule applied to 'brand_name' field
            'string' => 'The :attribute must be a string.',
            'max' => 'The :attribute must not be greater than :max characters.',
            'unique' => 'The :attribute has already been taken.',
        ];
        
        // Validate request data with custom messages
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|string|max:255|unique:brand,name',
        ], $messages);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]);
        }
    
        // If validation passes, proceed with creating the brand
        // Create a new brand instance and populate it with the validated data
        $brand = new Brand();
        $brand->name = $request->brand_name;
        
        // Save the brand to the database
        $brand->save();
    
        // Optionally, you can return a response or redirect to a different page
        return redirect()->back()->with('success', 'Brand created successfully');
    }
    
    
    
}


