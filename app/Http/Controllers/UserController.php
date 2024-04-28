<?php

namespace App\Http\Controllers;

use App\Models\BussinessReview;
use App\Models\BussinessService;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function index(){

        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function indexAll(){

        $users = User::all();

        return view('admin.allusers', ['users' => $users]);
    }

    public function deleteUsers($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back()->with('success', 'Record deleted successfully');
}



public function toggleBlockUsers($id)
{
    $user = User::findOrFail($id);
    $user->is_active = $user->is_active ? 0 : 1;
    $user->save();

    $status = $user->is_active ? 'blocked' : 'unblocked';
    $message = "User $status successfully";

    return redirect()->back()->with('success', $message);
}


   public function create(Request $request)
{
    // Validate the incoming request data

    $messages  =  [
        'firstname.required' => 'First name is required.',
        'firstname.string' => 'First name must be a string.',
        'firstname.max' => 'First name may not be greater than :max characters.',
         'othername.string' => 'Other name must be a string.',
        'othername.max' => 'Other name may not be greater than :max characters.',
        'email.required' => 'Email is required.',
        'email.email' => 'Invalid email format.',
        'email.unique' => 'Email already exists.',
        'pword.required' => 'Password is required.',
        'pword.string' => 'Password must be a string.',
        'pword.min' => 'Password must be at least :min characters long.',
        'type.required' => 'User type is required.',
        'phone.required' => 'Phone is required.',
        'type.in' => 'Invalid user type.'
    ];

    $validator = Validator::make($request->all(), [
        'firstname' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'othername' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email',
        'pword' => 'required|string|min:6', // Adjust the minimum password length as needed
        'type' => 'required|in:user,dealer,admin', // Ensure the type is one of the specified values
    ], $messages);

     // Check if validation fails
     if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]); // Redirect back with input and error message
        // return redirect()->back()->with(['error' => 'Category created successfully']);
    }


    // Create a new user instance and populate it with the validated data
    $user = new User();
    $user->name = $request->firstname;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->password = bcrypt($request->pword); // Hash the password for security
    $user->is_active = 1;
    $user->role = $request->type;

    // Save the user to the database
    $user->save();

    // Optionally, you can return a response or redirect to a different page
    return redirect()->back()->with('success', 'User added successfully');
}

    public function showProfile($userid)
    {
        // Find the user profile

        $profile = User::find($userid);

        $bussiness_service = BussinessService::where('user_id', $userid)->get();

        $reviews = BussinessReview::with('user')->where('bussiness_id', $userid)->get();

        // Check if the user profile exists
        if (!$profile) {
            abort(404); // Or handle the case where the user does not exist
        }

        // Count the total cars uploaded by the dealer
        $carsCount = Product::where('user_id', $userid)->count();

        return view('home.profile', ['profile' => $profile, 'reviews' => $reviews,  'carsCount' => $carsCount , 'bussiness_service' => $bussiness_service]);
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

        return view('admin.profile', ['profile' => $profile]);
    }



    public function updateProfile(Request $request)
    {
        $user = auth()->user();

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
                if (!empty($service)) { // Check if the service is not empty
                    BussinessService::create([
                        'user_id' => $user->id,
                        'bussiness_name' => $service
                    ]);
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



}
