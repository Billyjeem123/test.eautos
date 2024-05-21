<?php

namespace App\Http\Controllers;

use App\Events\ManagePartEvent;
use App\Models\CarPartCategory;
use App\Models\Part;
use App\Models\PartReviews;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class PartController extends Controller
{


    public function createParts()
    {

        $partcategories = CarPartCategory::all();

        return view('admin.parts.index', ['partcategories' => $partcategories]);
    }


    public function store(Request $request)
    {
        $role = auth()->user()->role == "admin" ? 1 : 0;
        $imageUrl = $this->uploadImageAndGetLink($request);
        // Save part
        $part = Part::create([
            'image' => $imageUrl,
            'part_name' => $request->part_name,
            'price' => $request->price,
            'part_category_id' => $request->part_category_id,
            'location' => $request->location,
            'user_id' => auth()->user()->id,
            'active' => $role,
            'description' => $request->description
        ]);

        // Return a success response
        return redirect()->back()->with(['success' => 'Part added successfully']);
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

    public function getAllParts(){
        $parts = Part::with('users', 'partcategories')
            ->orderBy('car_part.id', 'DESC') // Order by id in descending order
            ->get();

        return view('admin.parts.part-listings', compact('parts'));
    }



    public function deletePart($id): \Illuminate\Http\RedirectResponse
    {
        $part = Part::findOrFail($id);
        $part->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }


    public function allPartCategory(){

        $partcategories = CarPartCategory::all();

        return view('admin.parts.part-category', ['partcategories' => $partcategories]);
    }


    public function createPartcategory(Request $request)
    {

        $category = CarPartCategory::create(['part_category' => $request->part_category_name]);
        $partcategories = CarPartCategory::all();

        // Return a success response
        return redirect()->back()->with(['success' => 'Category created successfully']);

    }



    public function deletePartCategory($id){

        $category = CarPartCategory::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');

    }

    public function approvePart($id)
    {
        $part = Part::findOrFail($id);
        $part->active = $part->active === 1 ? 0 : 1;
        $part->save();

        if ($part->users->role != 'admin') {
            $title = "Your Car Part Listing: '$part->part_name' Was Not Approved";
            $message = "Dear User,\n\nWe regret to inform you that your car part listing, '$part->part_name', was not approved. Please review our guidelines and make the necessary adjustments before resubmitting.\n\nThank you for your understanding.";

            event(new ManagePartEvent($part->users->email, $title, $message));
        }



        return redirect()->back()->with('success', 'Part status updated successfully.');
    }

    public function unapprovePart($id)
    {
        $part = Part::findOrFail($id);
        $part->active = $part->active === 0 ? 1 : 0;
        $part->save();
        if ($part->users->role != 'admin') {
            $title = "Congrats! Your Car Part Listing: '$part->part_name' Has Been Approved";
            $message = "Dear User,\n\nWe are pleased to inform you that your car part listing, '$part->part_name', has been approved. It is now live on our platform.\n\nThank you for your contribution!";

            event(new ManagePartEvent($part->users->email, $title, $message));
        }



        return redirect()->back()->with('success', 'Part status updated successfully.');
    }



    public  function  getPartView()
    {

        $parts = Part::with('partcategories')->where('active', 1)->get();

        $partCategories = CarPartCategory::all();

        return view('home.part.index', compact('parts', 'partCategories'));
    }

    public function viewPartDetails($id){


        $part = Part::with('partcategories', 'users')->find($id);

        $reviews = PartReviews::with('user')->where('part_id', $part->id)->get();

        return view('home.part.view-part', compact('part', 'reviews'));


    }

}

