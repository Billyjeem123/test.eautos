<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\BussinessServiceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{

    public function index(){

        $brands = Brand::all();

        return view('admin.brand', ['brands' => $brands]);
    }

    public function show_service(){

        $services = BussinessServiceList::all();

        return view('admin.services', ['services' => $services]);
    }



    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function delete_service($id)
    {
        $brand = BussinessServiceList::findOrFail($id);
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





    public function save_service(Request $request)
    {
        // Define custom error messages
        $messages = [
            'required' => 'The :attribute field is required.', // Generic message for required rule
            'service_name.required' => 'The brand name field is required.', // Custom message for required rule applied to 'brand_name' field
            'string' => 'The :attribute must be a string.',
            'max' => 'The :attribute must not be greater than :max characters.',
            'unique' => 'The :attribute has already been taken.',
        ];

        // Validate request data with custom messages
        $validator = Validator::make($request->all(), [
            'service_name' => 'required|string|max:255|unique:bussiness_service_lists,service_list',
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]);
        }

        // If validation passes, proceed with creating the brand
        // Create a new brand instance and populate it with the validated data
        $brand = new BussinessServiceList();
        $brand->service_list = $request->service_name;

        // Save the service  to the database
        $brand->save();

        // Optionally, you can return a response or redirect to a different page
        return redirect()->back()->with('success', 'Service created successfully');
    }

}


