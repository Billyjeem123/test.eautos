<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Message;
use App\Models\Product;
use App\Models\Report;
use App\Models\RequestCar;
use App\Models\User;
use App\Models\ValueAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;
class AdminController extends Controller
{


    public function index(){

        $user = Auth::user();
    $unreadNotificationsCount = $user->unreadNotifications()->count();
    $notifications = $user->unreadNotifications;
    $usersCount = User::all()->count();
     $productCount = Product::all()->count();
     $caseReport = Report::all()->count();
     $carRequest =  RequestCar::all()->count();
     $valueAsset = ValueAsset::all()->count();
     $category = Category::all()->count();

        return view('admin.index', ['unreadNotificationsCount' => $unreadNotificationsCount,
            'usersCount' => $usersCount, 'productCount' => $productCount, 'caseReport' => $caseReport,
            'carRequest' => $carRequest, 'valueAsset' => $valueAsset, 'category' => $category,
            'notifications' => $notifications]);
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

    public function markAsRead($id)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Find the notification by id
        $notification = $user->notifications()->find($id);

        // Optionally, you can redirect the user back or to another page
        return redirect()->back()->with('success', 'Notification marked as read.');
    }



    public  function getEvaluations(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {



        $allAsset = ValueAsset::with('asset_docs')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.asset-evaluation', ['allAsset' => $allAsset]);


    }


    public  function reportComplaint($id)
    {
      $report =   Report::find($id);

        $report->is_viewed = 1;
        $report->save();

        return view('admin.modal.report-modal', ['report' => $report]);
    }


    public  function careRequests($id)
    {
        $request =   RequestCar::find($id);
        $request->is_viewed = 1;
        $request->save();

        return view('admin.modal.request-modal', ['request' => $request]);
    }


    public  function productDetails($id)
    {
        $product =   Product::with('categories', 'user', 'brand', 'images')->find($id);
        $product->is_viewed = 1;
        $product->save();

//         echo "<pre>";
//         echo json_encode($product, JSON_PRETTY_PRINT);
//         echo "</pre>";

        return view('admin.modal.product-modal', ['product' => $product]);
    }


    public  function asset_evaluation($id)
    {
        $product =   Product::with('categories', 'user', 'brand', 'images')->find($id);
        $product->is_viewed = 1;
        $product->save();

//         echo "<pre>";
//         echo json_encode($product, JSON_PRETTY_PRINT);
//         echo "</pre>";

        return view('admin.modal.product-modal', ['product' => $product]);
    }



      public function allMessages(){


          $messages = Message::where('receiver_id', auth()->user()->id)
              ->orderBy('id', 'desc')
              ->get();



          return view('admin.message', ['messages' => $messages]);

     }

    public function allMessagesById($id){
        // Find the message by its ID
        $message = Message::find($id);

        // Update the is_seen column to 1
        $message->update(['is_seen' => 1]);

        // Return the view with the updated message
        return view('admin.modal.messages', ['message' => $message]);
    }



    public function deleteMessage($id): \Illuminate\Http\RedirectResponse
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function auctionAll()
    {
        $auctions = Auction::orderBy('id', 'desc')->get();


        return view('admin.auction-listing', ['auction' => $auctions]);

    }

    public function interestedBidders(){

        $bids = Bid::with('auction')->where('owner_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.bidders-list', ['bids' => $bids]);




    }





}


