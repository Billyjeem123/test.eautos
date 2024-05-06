<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\StolenCar;
use Illuminate\Http\Request;

class StolenCarController extends Controller
{
    public function index(){


         $categories = Category::all();

        return view('admin.stolencar', compact('categories'));
    }

    public function store(Request $request)
    {
        $role = auth()->user()->role == "admin" ? 1 : 0;
        $imageUrl = $this->uploadImageAndGetLink($request);
        // Save part
         StolenCar::create([
            'image' => $imageUrl,
            'name' => $request->car_name ?? "null",
            'user_id' => auth()->user()->id,
            'address' => $request->last_seen,
            'color' => $request->color,
            'views' =>0,
            'is_approved' => $role,
        ]);

        // Return a success response
        return redirect()->back()->with(['success' => 'Record added successfully']);
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
