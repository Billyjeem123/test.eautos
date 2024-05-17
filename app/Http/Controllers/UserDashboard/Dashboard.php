<?php

namespace App\Http\Controllers\UserDashboard;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Brand;
use App\Models\BussinessService;
use App\Models\CarPartCategory;
use App\Models\Category;
use App\Models\Message;
use App\Models\Part;
use App\Models\Product;
use App\Models\Report;
use App\Models\RequestCar;
use App\Models\SoldItems;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\ValueAsset;
use App\Notifications\AlertAdminOfActivities;
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
//            'user_id' => 14,
            'cylinder' => $request->cylinder,
            'car_name' => $request->car_name,
            'is_approved' => auth()->user()->role === 'admin' ? 1 : 0,
//            'is_approved' => 0,
            'is_installemt' => $request->is_installemt ? 1 : 0

        ]);


        $imageUrls = $this->uploadImagesAndGetLinks($request);

        foreach ($imageUrls as $imageUrl) {
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imageUrl,
            ]);
        }


        $user = auth()->user()->id;

        $title = "Urgent Action Needed";
        $message = "You have a pending product approval";

        $data = [
            'title'  => $title,
            'message' => $message
        ];

         $useradmin = User::where('role', 'admin')->get();
        foreach ($useradmin as $admin) {
            $admin->notify(new AlertAdminOfActivities($data));
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
        return view('users.products_all', ['products' => $products]);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function ShowDashboardProfile()
    {
        // Find the user profile
        $profileid = auth()->user()->id;

        // Check if the user profile exists
        if (!$profileid) {
            abort(404); // Or handle the case where the user does not exist
        }

        $profile  = User::find($profileid);

        return view('users.profile', ['profile' => $profile]);
    }


//    public function updateProfile(Request $request)
//    {
//        $user = auth()->user();
//
//        // Update user profile fields
//        $user->fill($request->only([
//            'name',
//            'email',
//            'bussiness_name',
//            'country',
//            'phone',
//            'about',
//            'business_location',
//            'business_state',
//            'organisation_services'
//
//        ]));
//
//        // Check if a new profile image is uploaded
//        if ($request->hasFile('profile_image')) {
//            $user->image = $this->uploadProfileImageAndGetLink($request);
//        }
//
//        // Save the user's profile
//        $user->save();
//
//        // Update or create business services
//        $businessServicesData = $request->input('businessCategoryWords');
//        if ($businessServicesData && is_array($businessServicesData)) {
//            foreach ($businessServicesData as $service) {
//                if (!empty($service)) { // Check if the service is not empty
//                    BussinessService::create([
//                        'user_id' => $user->id,
//                        'bussiness_name' => $service
//                    ]);
//                }
//            }
//        }
//
//        return redirect()->back()->with('success', 'Profile updated successfully');
//    }


    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'bussiness_name' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'business_location' => 'nullable|string|max:255',
            'business_state' => 'nullable|string|max:255',
            'organisation_services' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'businessCategoryWords' => 'nullable|array'
        ]);

        // Update user profile fields
        $user->fill($request->only([
            'name',
            'email',
            'bussiness_name',
            'country',
            'phone',
            'about',
            'business_location',
            'business_state',
            'organisation_services'
        ]));

        // Check if a new profile image is uploaded
        if ($request->hasFile('profile_image')) {
            $user->image = $this->uploadProfileImageAndGetLink($request);
        }

        // Save the user's profile
        $user->save();

        // Update or create business services
        $businessServicesData = $request->input('businessCategoryWords');
        if ($businessServicesData && is_array($businessServicesData)) {
            foreach ($businessServicesData as $service) {
                if (!empty($service)) {
                    BussinessService::updateOrCreate(
                        ['user_id' => $user->id, 'bussiness_name' => $service],
                        ['bussiness_name' => $service]
                    );
                }
            }
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }



    public function uploadProfileImageAndGetLink($request): ?string
    {
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name for the file
            $filePath = $file->storeAs('public/uploads', $fileName);
            $fileUrl = asset('storage/uploads/' . $filePath);
            return $fileUrl;
        } else {
            // Handle case where no file was uploaded
            return null;
        }
    }



    public function getSubcategories($categoryId): \Illuminate\Http\JsonResponse
    {
        // Logic to fetch subcategories based on the category ID
        $subcategories = SubCategory::where('category_id', $categoryId)->pluck('name', 'id');
        return response()->json($subcategories);
    }


    public function allMessages(){


        $messages =  Message::where('receiver_id', auth()->user()->id)->get();


        return view('users.message', ['messages' => $messages]);

    }

    public function allMessagesById($id){
        // Find the message by its ID
        $message = Message::find($id);

        // Update the is_seen column to 1
        $message->update(['is_seen' => 1]);

        // Return the view with the updated message
        return view('users.modal.messages', ['message' => $message]);
    }



    public function deleteMessage($id): \Illuminate\Http\RedirectResponse
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function delete_product($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public  function product_details($id)
    {
        $product =   Product::with('categories', 'user', 'brand', 'images')->find($id);

        return view('users.modal.product-modal', ['product' => $product]);
    }


     public function  part_page()
     {
         $partcategories = CarPartCategory::all();

         return view('users.part', ['partcategories' => $partcategories]);
     }


    public function save_parts(Request $request)
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
        return redirect()->back()->with(['success' => 'Part added successfully.. You would be notified upon approval']);
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



    public function get_all_parts(){

        $parts =  Part::with('users', 'partcategories')->where('user_id', auth()->user()->id)->get();

        return view('users.get-parts', compact('parts'));
    }

    public function delete_part($id): \Illuminate\Http\RedirectResponse
    {
        $part = Part::findOrFail($id);
        $part->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }


    public  function view_all_reports()
    {
        $reports  = Report::where('user_id', auth()->user()->id)->get();
        return view('users.reported-vendors', ['reports' => $reports]);
    }


    public  function view_report_complaint($id)
    {
        $report =   Report::find($id);

        return view('users.modal.report', ['report' => $report]);
    }


    public function view_all_requests(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $requests  = RequestCar::where('user_id', auth()->user()->id)->get();
        return view('users.requests', ['requests' => $requests]);


    }


    public function delete_request($id): \Illuminate\Http\RedirectResponse
    {
        $requests = RequestCar::findOrFail($id);
        $requests->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }


     public  function get_asset_evaluation()
     {
         $allAsset = ValueAsset::with('asset_docs')->where('user_id', auth()->user()->id)->get();
         return view('users.assets_evaluation', ['allAsset' => $allAsset]);
     }


     public function sold_items(){

         $solditems = SoldItems::with('buyer_details')->where('owner_id', auth()->user()->id)->get();
         return view('users.sold-history', ['solditems' => $solditems]);
     }


     public function sold_items_by_id($id){

         $solditem = SoldItems::with('buyer_details')->where('id', $id)->first();

//         echo "<pre>";
//          echo json_encode($solditem, JSON_PRETTY_PRINT);
//          echo "</pre>";
         return view('users.modal.orders', ['solditem' => $solditem]);
     }
}

