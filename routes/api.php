<?php

use App\Http\Controllers\UserDashboard\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/save-user-product1', [Dashboard::class, 'product_save'])->name('user.product.save');




Route::post('bvn', function (Request $request) {
    $bvn = $request->input('bvn');  // Retrieve the BVN from the request

    try {
        $response = Http::withHeaders([
            'AppId' => '6440d5a067eee90036cca2bf',
            'Authorization' => 'test_sk_WkSF1tNXPqudja0SPU7usI50p',
            'accept' => 'application/json',
        ])->get('https://sandbox.dojah.io/api/v1/kyc/bvn/full', [
            'bvn' => $bvn
        ]);

        if ($response->successful()) {
            return response()->json($response->json());  // Returns the JSON response as an array
        } else {
            // Log or handle the error response as needed
            return response()->json(['error' => 'Request failed with status ' . $response->status()], $response->status());
        }
    } catch (\Exception $e) {
        // Handle exceptions or errors
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
