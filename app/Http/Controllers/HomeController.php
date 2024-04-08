<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {


        $brands = Brand::all();

        $getDealers = User::where('role', 'dealer')->take(5)->pluck('name');

        $products  = Product::with('brand', 'images', 'categories')->get();

        return view('home.index', ['brands' => $brands, 'products' => $products, 'getDealers' => $getDealers]);
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
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'business_name' => 'required|unique:users,bussiness_name',
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
        $user->bussiness_name = $request->business_name;
        $user->experience = $request->experience;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->pword); // Hash the password for security
        $user->is_active = 1;
        $user->role = 'dealer';

        // Save the user to the database
        $user->save();

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
            'role' => 'provider',
        ]);

        // Save the user to the database
        $user->save();

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

        // Redirect to the index page with a success message
        return redirect()->route('index')->with('success', 'Registration successful');
    }





}
