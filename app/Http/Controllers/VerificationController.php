<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerificationController extends Controller
{

    public function store(Request $request)
    {
        // Validate the input data
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'nin' => 'nullable|string|max:20',
            'tin' => 'nullable|string|max:20',
            'business_reg' => 'nullable|string|max:50',
            'nin_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'tin_document' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'business_certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
            'description' => 'nullable|string',
        ]);

        try {
            // Handle file uploads using the refactored method
            $data['nin_document'] = $this->uploadFileAndGetLink($request, 'nin_document');
            $data['tin_document'] = $this->uploadFileAndGetLink($request, 'tin_document');
            $data['business_certificate'] = $this->uploadFileAndGetLink($request, 'business_certificate');

            // Attach the logged-in user's ID
            $data['user_id'] = auth()->id();

            // Create the verification record in the database
            Verification::create($data);

            return redirect()->back()->with('success', 'Verification request submitted successfully.');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Verification submission failed: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors(['error' => 'An error occurred while submitting your verification request. Please try again later.']);
        }
    }

    public function uploadFileAndGetLink($request, $fileKey): ?string
    {
        $fileUrl = null;

        try {
            if ($request->hasFile($fileKey)) {
                $file = $request->file($fileKey);
                $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name for the file
                $filePath = $file->storeAs('public/uploads', $fileName); // Store the file in 'public/uploads'
                $fileUrl = asset('storage/uploads/' . $fileName); // Generate the URL to the stored file
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('File upload failed: ' . $e->getMessage());

            // Optionally, you could throw an exception or return a default value
            throw new \Exception('File upload failed.');
        }

        return $fileUrl;
    }



}
