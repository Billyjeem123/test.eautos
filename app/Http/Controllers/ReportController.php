<?php

namespace App\Http\Controllers;

use App\Events\ReportEvent;
use App\Models\Product;
use App\Models\Report;
use App\Models\RequestCar;
use App\Models\User;
use App\Notifications\ReportOffender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    //
    public function viewReport(){
        return view('home.report.report');

    }


    public function viewRequest(){
        return view('home.report.request');

    }

    public function comparePage(){

        $products  = Product::with('brand', 'images', 'categories')->where('is_approved', 1)->get();
        return view('home.compare.compare', ['products' => $products]);

    }





    public function save_report(Request $request)
    {

        $user = User::where('email', $request->business_name);
        $report = new Report();
        $report->name_of_offender = $request->input('offender_name'); #
        $report->bussines_name = $request->input('business_name'); #
        $report->offernder_location = $request->input('location');
        $report->complaint = $request->input('complain'); #waiting
        $report->reporter_name = $request->input('name'); #
        $report->country = $request->input('country');
        $report->reporter_phone = $request->input('phone_number'); #
        $report->reporter_mail = $request->input('email');
        $report->user_id = auth()->user()->id;
        $report->offender_id = $user->id;
        $report->save();

        $data = [
            'title' => 'Urgent Vendor Report Notification',
            'message' => 'An urgent notification has been received from a user regarding a vendor. Please find below the detailed report,  on your dashboard:'
        ];


        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new ReportOffender($data));
        }


        // Redirect back with success message
        return redirect()->back()->with('success', 'Your report has been submitted successfully. You will be notified upon any updates.');

    }


    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        // Check if the email exists in your database
        $business = User::where('email', $email)->first();

        if ($business) {
            // Email exists, fetch the corresponding business name
            $business_name = $business->email; // Assuming 'name' is the column for business name
            return response()->json(['exists' => true, 'business_name' => $business_name]);
        } else {
            // Email does not exist
            return response()->json(['exists' => false]);
        }
    }



public function store(Request $request)
{
    // Validate the incoming request data
    $validator = $this->validateRequest($request);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()->withInput()->withErrors(['error' => $validator->errors()->first()]);
    }

    // Create and save the report
    $report = new Report();
    $report->name_of_offender = $request->input('offender_name'); #
    $report->bussines_name = $request->input('business_name'); #
    $report->offernder_location = $request->input('location');
    $report->complaint = $request->input('complain'); #waiting
    $report->reporter_name = $request->input('name'); #
    $report->country = $request->input('country');
    $report->reporter_phone = $request->input('phone_number'); #
    $report->reporter_mail = $request->input('email');
    $report->user_id = auth()->user()->id;
    $report->offender_id = $request->offender_id;
    $report->save();

    $data = [
        'title' => 'Urgent Vendor Report Notification',
        'message' => 'An urgent notification has been received from a user regarding a vendor. Please find below the detailed report,  on your dashboard:'
    ];


    $admins = User::where('role', 'admin')->get();
    foreach ($admins as $admin) {
        $admin->notify(new ReportOffender($data));
    }


    // Redirect back with success message
    return redirect()->back()->with('success', 'Your report has been submitted successfully. You will be notified upon any updates.');

}


private function validateRequest(Request $request)
{
    // Define validation rules
    $rules = [
        'offender_name' => 'required|string|max:255',
        'business_name' => 'required|string|max:255',
        'location' => 'nullable|string|max:255',
        'complain' => 'required|string',
        'name' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ];

    // Define custom error messages
    $messages = [
        'offender_name.required' => 'Please enter the name of the offender.',
        'complain.required' => 'Please provide a description of the complaint.',
        'name.required' => 'Please enter your name.',
    ];

    // Perform validation
    return Validator::make($request->all(), $rules, $messages);
}

    public function viewAllReports(){

         $reports  = Report::all();
        return view('admin.report', ['reports' => $reports]);


    }


    public function viewAllRequests(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $requests  = RequestCar::all();
        return view('admin.requests', ['requests' => $requests]);


    }
    public function delete($id)
    {
        $Report = Report::findOrFail($id);
        $Report->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }


    public function deleteRequests($id): \Illuminate\Http\RedirectResponse
    {
        $requests = RequestCar::findOrFail($id);
        $requests->delete();
        return redirect()->back()->with('success', 'Record deleted successfully');
    }



    public function saveCarRequest(Request $request): \Illuminate\Http\RedirectResponse
    {

        // Create and save the report
        $report = new RequestCar();
        $report->brand = $request->input('brand');
        $report->model = $request->input('model');
        $report->budget = $request->input('budget');
        $report->body = $request->input('body');
        $report->country = $request->input('country');
        $report->phone = $request->input('phone_number');
        $report->user_id = auth()->user()->id;
        $report->user_name = auth()->user()->name;
        $report->save();

//        $mail = 'billy@gmail.com';
//        $messages = 'You have a new car request';
//
//        event(new ReportEvent($mail, $messages));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your request has been submitted successfully. You will be notified upon any updates.');

    }

}
