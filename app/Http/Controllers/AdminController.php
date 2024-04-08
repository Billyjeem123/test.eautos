<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
class AdminController extends Controller
{


    public function index(){

        $user = Auth::user();
    $unreadNotificationsCount = $user->unreadNotifications()->count();
    $notifications = $user->unreadNotifications;

        return view('admin.index', ['unreadNotificationsCount' => $unreadNotificationsCount, 'notifications' => $notifications]);
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication successful

            // Retrieve the authenticated user
            $user = Auth::user();

            // Check if the user's role is "admin"
            if ($user->role === 'admin') {
                // Redirect the admin user to the home page
                return redirect()->route('admin.index');
            } else {
                // User is not an admin, access denied
                Auth::logout(); // Log out the user
                return redirect()->back()->withErrors(['email' => 'Access denied']);
            }
        } else {
            // Authentication failed

            // Redirect back to the login form with an error message
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput($request->only('email'))
                ->with('error', 'Invalid credentials'); // Add a flash message to be displayed in the view
        }
    }


    public function logout()
{
    Auth::logout();

    return redirect()->route('admin.login');
}



 public function showlogin(){

    return view('admin.login');
 }

 public function markAsRead()
{
    // Get the authenticated user
    $user = Auth::user();

    // Mark all unread notifications as read for the user
    $user->unreadNotifications->markAsRead();

    // Optionally, you can redirect the user back or to another page
    return redirect()->back()->with('success', 'Notification marked as read.');
}
}


