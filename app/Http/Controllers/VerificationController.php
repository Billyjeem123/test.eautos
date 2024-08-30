<?php

namespace App\Http\Controllers;

use App\Models\BvnData;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        if (Verification::where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Verification request already sent. You cannot resend.');
        }

        return DB::transaction(function () use ($request, $data) {
            try {
                // Handle file uploads using the refactored method
                $data['business_certificate'] = $this->uploadFileAndGetLink($request, 'business_certificate');

                // Attach the logged-in user's ID
                $data['user_id'] = auth()->id();

                // Create the verification record in the database
                $verification = Verification::create($data);

                // Get BVN data (using the BVN provided in the request)
                $bvnResponse = $this->verifyBvnIfValid($request->input('nin'));

                if (isset($bvnResponse['entity'])) {
                    $bvnData = $bvnResponse['entity'];

                    // Decode the base64 image if available
                    $bvnData['image'] = $this->handleBase64Image($bvnData['image']);

                    // Save BVN data into the database
                    BvnData::create([
                        'bvn' => $bvnData['bvn'],
                        'first_name' => $bvnData['first_name'],
                        'last_name' => $bvnData['last_name'],
                        'middle_name' => $bvnData['middle_name'],
                        'gender' => $bvnData['gender'],
                        'date_of_birth' => $bvnData['date_of_birth'],
                        'phone_number1' => $bvnData['phone_number1'],
                        'phone_number2' => $bvnData['phone_number2'],
                        'image' => $bvnData['image'],
                        'user_id' => Auth::id(),
                        'customer' => $bvnData['customer'],
                    ]);
                } else {
                    return redirect()->back()->withErrors(['error' => 'Incorrect BVN details. ' . ($bvnResponse['error'] ?? 'An unknown error occurred during BVN verification.')]);
                }

                return redirect()->back()->with('success', 'Verification request submitted successfully.');
            } catch (\Exception $e) {
                // Log the error for debugging
                Log::error('Verification submission failed: ' . $e->getMessage());

                // Redirect back with an error message
                return redirect()->back()->withErrors(['error' => 'An error occurred while submitting your verification request. Please try again later.']);
            }
        });
    }

    public function store101(Request $request)
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


        if (Verification::where('user_id', Auth::id())->exists()) {
            return redirect()->back()->with('error', 'Verification request already sent. You cannot resend.');
        }


        try {
            // Handle file uploads using the refactored method
//            $data['nin_document'] = $this->uploadFileAndGetLink($request, 'nin_document');
//            $data['tin_document'] = $this->uploadFileAndGetLink($request, 'tin_document');
            $data['business_certificate'] = $this->uploadFileAndGetLink($request, 'business_certificate');

            // Attach the logged-in user's ID
            $data['user_id'] = auth()->id();

            // Create the verification record in the database
            $verification = Verification::create($data);

            // Get BVN data (using the BVN provided in the request)
            $bvnResponse = $this->verifyBvnIfValid($request->input('nin'));

            if (isset($bvnResponse['entity'])) {
                $bvnData = $bvnResponse['entity'];

                // Decode the base64 image if available
                $bvnData['image'] = $this->handleBase64Image($bvnData['image']);

                // Save BVN data into the database
                BvnData::create([
                    'bvn' => $bvnData['bvn'],
                    'first_name' => $bvnData['first_name'],
                    'last_name' => $bvnData['last_name'],
                    'middle_name' => $bvnData['middle_name'],
                    'gender' => $bvnData['gender'],
                    'date_of_birth' => $bvnData['date_of_birth'],
                    'phone_number1' => $bvnData['phone_number1'],
                    'phone_number2' => $bvnData['phone_number2'],
                    'image' => $bvnData['image'],
                    'user_id' => Auth::id(),
                    'customer' => $bvnData['customer'],
                ]);

            }else{
                return redirect()->back()->withErrors(['error' => 'Incorrect BVN details'  . $bvnResponse['error'] ?? 'An unknown error occurred during BVN verification.']);
            }

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


    public function handleBase64Image($base64Image): ?string
    {
        $fileUrl = null;

        try {
            if (!empty($base64Image)) {
                // Decode the base64 image data
                $fileName = time() . '.png'; // Assuming PNG format; adjust as needed
                $filePath = 'public/uploads/' . $fileName;

                // Save the image to the file system within the storage/app/public/uploads directory
                Storage::disk('public')->put('uploads/' . $fileName, base64_decode($base64Image));

                // Generate the URL to the stored file
                $fileUrl = asset('storage/uploads/' . $fileName);
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Base64 image processing failed: ' . $e->getMessage());

            // Optionally, you could throw an exception or return a default value
            throw new \Exception('Base64 image processing failed.');
        }

        return $fileUrl;
    }





    public function verifyBvnIfValid($bvn)
    {
        try {
            $response = Http::withHeaders([
                'AppId' => '6440d5a067eee90036cca2bf',
                'Authorization' => 'test_sk_WkSF1tNXPqudja0SPU7usI50p',
                'accept' => 'application/json',
            ])->get('https://sandbox.dojah.io/api/v1/kyc/bvn/full', [
                'bvn' => $bvn
            ]);

            if ($response->successful()) {
                return $response->json();  // Returns the JSON response as an array
            } else {
                // Log or handle the error response as needed
                throw new \Exception('Request failed with status ' . $response->status());
            }
        } catch (\Exception $e) {
            // Handle exceptions or errors
            return ['error' => $e->getMessage()];
        }
    }


}
