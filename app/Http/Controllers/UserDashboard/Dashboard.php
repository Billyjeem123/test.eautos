<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Report;
use App\Models\RequestCar;
use App\Models\User;
use App\Models\ValueAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{

    public function index(){

        $user = Auth::user();
        $unreadNotificationsCount = $user->unreadNotifications()->count();
        $notifications = $user->unreadNotifications;
        $productCount = Product::where('user_id', $user->id)->count();
        $caseReport = Report::where('user_id', $user->id)->count();
        $carRequest =  RequestCar::where('user_id', $user->id)->count();
        $valueAsset = ValueAsset::where('user_id', $user->id)->count();

        return view('users.index', ['unreadNotificationsCount' => $unreadNotificationsCount,
            'productCount' => $productCount, 'caseReport' => $caseReport,
            'carRequest' => $carRequest, 'valueAsset' => $valueAsset,
            'notifications' => $notifications]);
    }



    public function product_create(){


        $brands = Brand::all();
        $categories=  Category::all();

        return view('users.create-product', ['brands' => $brands, 'categories' => $categories]);
    }


    public  function product_save(Request $request){

        $product  = Product::create([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'brand_id' => $request->brand_id,
            'model' => $request->model,
            'color' => $request->color,
            'address' => $request->address,
            'location' => $request->location,
            'price' => $request->price,
            'deed' => $request->deed  ? 1 : 0,
            'car_receipt' => $request->car_receipt ? 1 : 0,
            'car_docs' => $request->car_docs ? 1 : 0,
            'mileage' => $request->mileage,
            'desc' => $request->desc,
            'user_id' => auth()->user()->id,
            'cylinder' => $request->cylinder,
            'car_name' => $request->car_name,
            'is_approved' => auth()->user()->role === 'admin' ? 1 : 0,
            'is_installemt' => $request->is_installemt ? 1 : 0

        ]);

        $imageUrls = $this->uploadImagesAndGetLinks($request);

        foreach ($imageUrls as $imageUrl) {
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imageUrl,
            ]);
        }


        // Return a success response
        return redirect()->back()->with(['success' => 'Product created successfully']);

    }




    public function uploadImagesAndGetLinks($request): array
    {
        $imageUrls = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name for the image
                $imagePath = $image->storeAs('public/uploads', $imageName);
                $imageUrl = asset('storage/uploads/' . $imageName);
                $imageUrls[] = $imageUrl;
            }
        } else {
            // Handle case where no images were uploaded
        }


        return $imageUrls;
    }


    public function getAllProducts(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {


        $products = Product::with('brand', 'images', 'categories')->where('user_id', auth()->user()->id)->get();

        // echo "<pre>";
        // echo json_encode($products, JSON_PRETTY_PRINT);
        // echo "</pre>";
        return view('users.products.all', ['products' => $products]);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }


}
