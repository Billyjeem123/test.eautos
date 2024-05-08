<?php

namespace App\Http\Controllers;

use App\Events\ManagePartEvent;
use App\Models\Brand;
use App\Models\Category;
use App\Models\StolenCar;
use Illuminate\Http\Request;

class StolenCarController extends Controller
{
    public function index(){


         $stolen  = StolenCar::with('user', 'brand')->get();
         $brands = Brand::all();


        return view('admin.stolen-listing', ['stolens' => $stolen, 'brands' => $brands]);
    }


    public function showuploadpage(){


        $brands = Brand::all();


        return view('admin.stolencar', ['brands' => $brands]);
    }

    public function store(Request $request)
    {
        $role = auth()->user()->role == "admin" ? 1 : 0;
        $imageUrl = $this->uploadImageAndGetLink($request);
        // Save part
         StolenCar::create([
            'image' => $imageUrl,
            'brand_id' => $request->brand_id,
             'plate_number' => $request->plate_number,
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


    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $stolen = StolenCar::findOrFail($id);
        $stolen->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }






    public function approveStolen($id)
    {
        $part = StolenCar::findOrFail($id);
        $part->is_approved = $part->is_approved === 1 ? 0 : 1;
        $part->save();

        if($part->user->role != 'admin'){
            $title = "Dear User, Your  car theft listing for :'$part->name was unapproved";

            event(new ManagePartEvent($part->users->email, $title));

        }


        return redirect()->back()->with('success', 'Record  updated successfully.');
    }

    public function unapproveStolenCar($id)
    {
        $part = StolenCar::findOrFail($id);
        $part->is_approved = $part->is_approved === 0 ? 1 : 0;
        $part->save();

        if($part->user->role != 'admin') {

            $title = "Congrats, Your Car theft  listing Name: '$part->name' has been approved";

            event(new ManagePartEvent($part->users->email, $title));
        }


        return redirect()->back()->with('success', 'Record updated successfully.');
    }


     public function getStolenCars(){

         $stolencars  = StolenCar::with('user', 'brand')->get();

         return view('home.stolen-cars', ['stolencars' => $stolencars]);
     }
}
