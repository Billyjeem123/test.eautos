<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;

class PartController extends Controller
{


    public function createParts()
    {


        return view('admin.parts.index');
    }


    public function store(Request $request)
    {
        $imageUrl = $this->uploadImageAndGetLink($request);
        // Save part
        $part = Part::create([
            'image' => $imageUrl,
            'part_name' => $request->part_name,
            'price' => $request->price,
            'location' => $request->location,
            'user_id' => auth()->user()->id,
            'is_active' => 1,
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

       $parts =  Part::with('user');

        return view('admin.parts.part-listings', compact('parts'));
    }


    public function deletePart($id): \Illuminate\Http\RedirectResponse
    {
        $part = Part::findOrFail($id);
        $part->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

}

