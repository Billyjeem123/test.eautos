<?php

namespace App\Http\Controllers;

use App\Events\ReportEvent;
use App\Models\Report;
use App\Models\RequestCar;
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
    $report->name_of_offender = $request->input('offender_name');
    $report->bussines_name = $request->input('business_name');
    $report->offernder_location = $request->input('location');
    $report->complaint = $request->input('complain');
    $report->reporter_name = $request->input('name');
    $report->country = $request->input('country');
    $report->reporter_phone = $request->input('phone_number');
    $report->reporter_mail = $request->input('email');
    $report->user_id = auth()->user()->id;
    $report->save();

     $mail = 'billy@gmail.com';
     $messages = 'You have a new message';

    event(new ReportEvent($mail, $messages));

    // Redirect back with success message
    return redirect()->back()->with('success', 'Your report has been submitted successfully. You will be notified upon any updates.');

}


private function validateRequest(Request $request)
{
    // Define validation rules
    $rules = [
        'offender_name' => 'required|string|max:255',
        'business_name' => 'required|string|max:255',
        'location' => 'required|string|max:255',
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
    public function delete($id)
    {
        $Report = Report::findOrFail($id);
        $Report->delete();
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
        $report->save();

        $mail = 'billy@gmail.com';
        $messages = 'You have a new car request';

        event(new ReportEvent($mail, $messages));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your request has been submitted successfully. You will be notified upon any updates.');

    }

}
