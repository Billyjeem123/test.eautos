<?php

namespace App\Http\Controllers;

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

}
