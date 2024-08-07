<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\BussinessServiceList;
use App\Models\CarPartCategory;
use App\Models\Category;
use App\Models\Group;
use App\Models\Part;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Util\Blacklist;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {


        $brands = Brand::all();

        $getDealers = User::where('role', 'dealer')->take(5)->select('name', 'image', 'id')->get();

        $getDealersCount = User::where('role', 'dealer')->count();


        $products  = Product::with('brand', 'images', 'categories')->where('is_approved', 1)->take(8)->get();


        $blogs = Blog::inRandomOrder()->limit(5)->get();

        $groups = Group::inRandomOrder()->limit(10)->get();

        $featuredProducts = Product::where('is_featured', 1)
            ->with('brand', 'images', 'categories') // Eager load relationships
            ->take(4) // Limit the number of results to 5
            ->get(); // Execute the query and retrieve the results

        $allProducts  = $products->count() ?? 0;

        $auction_count = Auction::all()->count() ?? 0;

        $featuredProvider = User::where('is_featured', 1)->take(5)->select('name', 'image', 'id')->take(4)->get();


        return view('home.index', ['brands' => $brands, 'auction_count' => $auction_count, 'dealers' => $getDealersCount,  'product_count' => $allProducts,  'featuredProvider' => $featuredProvider,   'featuredProducts' => $featuredProducts,  'groups' => $groups,  'blogs' => $blogs,  'products' => $products, 'getDealers' => $getDealers]);
    }


    public function loginUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended()->with('success', 'Login successful...Redirecting');


        }

        // Authentication failed
        session()->flash('error', 'The provided credentials do not match our records.');
        return back()->withInput();
    }


    public function register(Request $request)
    {
        $role = $request->input('role');

        // Redirect the user based on the selected role
        if ($role === 'dealer') {
            return redirect()->route('dealer.register');
        } elseif ($role === 'service_provider') {
            return redirect()->route('service_provider.register');
        } else {
            return redirect()->route('buyer.register');
        }
    }


    public function register_dealer(){
        $services_list = BussinessServiceList::all();

        // Determine the cut-off point for the main services and advanced services
        $main_services = $services_list->take(5); // Take the first 5 services
        $advanced_services = $services_list->slice(5); // Take all services starting from the 6th one

        return view('home.signup.dealer', compact('main_services', 'advanced_services'));
    }


    public function register_provider(){
        $services_list = BussinessServiceList::all();

        // Determine the cut-off point for the main services and advanced services
        $main_services = $services_list->take(5); // Take the first 5 services
        $advanced_services = $services_list->slice(5); // Take all services starting from the 6th one

        return view('home.signup.provider', compact('main_services', 'advanced_services'));
    }

    public function register_buyer(){
        $services_list = BussinessServiceList::all();

        // Determine the cut-off point for the main services and advanced services
        $main_services = $services_list->take(5); // Take the first 5 services
        $advanced_services = $services_list->slice(5); // Take all services starting from the 6th one

        return view('home.signup.user', compact('main_services', 'advanced_services'));
    }




    public function saveDealer(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the incoming request data

        $messages  =  [
            'name.required' => 'First name is required.',
            'name.string' => 'First name must be a string.',
            'name.max' => 'First name may not be greater than :max characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'email.unique' => 'Email already exists.',
            'pword.required' => 'Password is required.',
            'pword.string' => 'Password must be a string.',
            'pword.min' => 'Password must be at least :min characters long.',
            'business_name' => 'Business name is required',
            'phone.required' => 'Phone is required.',
            'user_location.required' => "Location is required"
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'user_location' => 'required',
            'business_name' => 'required|unique:users,business_name',
            'pword' => 'required|string|min:6', // Adjust the minimum password length as needed
        ], $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
            // return redirect()->back()->with(['error' => 'Category created successfully']);
        }


        // Create a new user instance and populate it with the validated data
        $user = new User();
        $user->name = $request->name;
        $user->business_name = $request->business_name;
        $user->experience = $request->experience;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->pword); // Hash the password for security
        $user->is_active = 1;
        $user->business_state = $request->user_location;
        $user->role = 'dealer';

        // Save the user to the database
        $user->save();

       $multiple_services =  $request->multiple_selection;

        foreach ($multiple_services as $services) {
            DB::table('business_services')->insert([
                'user_id' => $user->id,
                'bussiness_name' => $services,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Authenticate and log in the user
        Auth::login($user);

        // Optionally, you can return a response or redirect to a different page
        return redirect()->route('index')->with('success', 'Registration successful');

    }


    public function saveUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'business_name' => 'Business name is required',
            'pword' => 'required|string|min:6', // Adjust the minimum password length as needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]);
        }

        // Create a new user instance and populate it with the validated data
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->pword),
            'is_active' => 1,
            'business_state' => $request->business_state,
            'role' => 'provider',
        ]);

        // Save the user to the database
        $user->save();

        $multiple_services =  $request->multiple_selection;

        foreach ($multiple_services as $services) {
            DB::table('business_services')->insert([
                'user_id' => $user->id,
                'bussiness_name' => $services,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }



        // Authenticate and log in the user
        Auth::login($user);

        // Redirect to the index page with a success message
        return redirect()->route('index')->with('success', 'Registration successful');
    }



    public function saveBuyer(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'pword' => 'required|string|min:6', // Adjust the minimum password length as needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]);
        }

        // Create a new user instance and populate it with the validated data
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->pword),
            'is_active' => 1,
            'role' => 'buyer',
        ]);

        // Save the user to the database
        $user->save();


        // Authenticate and log in the user
        Auth::login($user);

        // Redirect to the index page with a success message
        return redirect()->route('index')->with('success', 'Registration successful');
    }


    public function getAllDealers(Request $request)
    {
        // Get the location from the request
        $location = $request->input('location');

        // Get dealers based on the location if provided
        $getDealers = User::where('role', 'dealer')
            ->when($location, function ($query, $location) {
                return $query->where('business_state', $location);
            })
            ->get();

//        $getDealers = User::when($location, function ($query, $location) {
//                return $query->where('business_state', $location);
//            })
//            ->get();

        // Initialize an array to store car counts for each dealer
        $carCounts = [];

        // Loop through each dealer
        foreach ($getDealers as $dealer) {
            // Get the car count for the current dealer
            $carCount = Product::where('user_id', $dealer->id)->count();

            // Store the car count in the array with the dealer's ID as the key
            $carCounts[$dealer->id] = $carCount;
        }

        // Pass the dealers, their car counts, and the selected location to the view
        return view('home.dealer.index', [
            'allDealers' => $getDealers,
            'carCounts' => $carCounts,
            'selectedLocation' => $location,
        ]);
    }




    public function searchPart(Request $request)
    {
        $searchTerm = $request->input('search');

        $parts = Part::where('part_name', 'LIKE', "%$searchTerm%")
            ->orWhere('description', 'LIKE', "%$searchTerm%")
            ->get();

        $searchFound = $parts->count();

        $partCategories= CarPartCategory::all();

        // Process and return the search results as per your requirement

        // For example, you can pass the $parts variable to a view
        return view('home.part.search-results', ['parts' => $parts, 'partCategories' => $partCategories, 'searchFound' => $searchFound]);
    }



    public function service_provider(){

//         $providers =
        // Fetch all business service lists that have associated users
        $businessServiceLists = BussinessServiceList::with('users')
            ->whereHas('users')
            ->paginate(5); // Adjust the pagination number as needed

//         echo "<pre>";
//         echo json_encode($businessServiceLists, JSON_PRETTY_PRINT);
//         echo "</pre>";
        $services  = BussinessServiceList::all();
         return view ('home.service-provider.index', compact('businessServiceLists', 'services'));

    }



    public function service_provider_search(Request $request) {
        // Get search parameters from the request
        $location = $request->input('location');
        $serviceId = $request->input('category');

        // Query for service providers
        $query = BussinessServiceList::query();

        // Apply filters if they exist
        if ($location) {
            $query->whereHas('users', function ($q) use ($location) {
                $q->where('business_state', $location);
            });
        }

        if ($serviceId) {
            $query->whereHas('users.businessServiceLists', function ($q) use ($serviceId) {
                $q->where('bussiness_name', $serviceId);
            });
        }

        // Fetch all business service lists that have associated users
        $businessServiceLists = $query->paginate(5); // Paginate main result set

        // Check if any results found
        $noRecordsFound = $businessServiceLists->isEmpty();

        $services  = BussinessServiceList::all();
        return view('home.service-provider.search', compact('businessServiceLists', 'services', 'noRecordsFound'));
    }



//    public function service_provider(Request $request) {
//        // Get search parameters from the request
//        $location = $request->input('location');
//        $serviceId = $request->input('category');
//
//        // Query for service providers
//        $query = BussinessServiceList::with('users');
//
//        // Apply filters if they exist
//        if ($location) {
//            $query->whereHas('users', function ($q) use ($location) {
//                $q->where('business_state', $location);
//            });
//        }
//
//        if ($serviceId) {
//            $query->whereHas('users.businessServiceLists', function ($q) use ($serviceId) {
//                $q->where('bussiness_name', $serviceId);
//            });
//        }
//
//        // Fetch all business service lists that have associated users
//        $businessServiceLists = $query->paginate(5); // Adjust the pagination number as needed
//
//        // Fetch all business service lists for the dropdown
//        $services = BussinessServiceList::all();
//
//        return view('home.service-provider.index', compact('businessServiceLists', 'services'));
//    }






}
