<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('');
// });

##Home routes

Route::group(['middleware' => ['showNavBar']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/report', [ReportController::class, 'viewReport'])->name('report.show');
    Route::post('/report/user', [ReportController::class, 'store'])->name('report.create')->middleware('auth');


    #request car

    Route::get('/request-a-car', [ReportController::class, 'viewRequest'])->name('request.show')->middleware('auth');
    Route::post('/request/user', [ReportController::class, 'saveCarRequest'])->name('save-request')->middleware('auth');
    Route::get('/search-asset', [ProductController::class, 'searchProduct'])->name('search');






    #Return interface of signup pages... Authentication routes
    Route::view('/register/dealer', 'home.signup.dealer')->name('dealer.register');
    Route::view('/register/service-provider', 'home.signup.provider')->name('service_provider.register');
    Route::view('/register/buyer', 'home.signup.user')->name('buyer.register');

    Route::post('/save-register-dealer', [HomeController::class, 'saveDealer'])->name('save.register.dealer');
    Route::post('/save-register-user', [HomeController::class, 'saveUser'])->name('save.register.user');
    Route::post('/save-register-buyer', [HomeController::class, 'saveBuyer'])->name('save.register.buyer');

    Route::view('/login', 'home.login')->name('login');
    Route::post('/login', [HomeController::class, 'loginUser'])->name('login.user');
    Route::view('/register', 'home.register')->name('register');
    Route::post('/register', [HomeController::class, 'register'])->name('register.user');


    #products.....

    Route::prefix('product')->group(function () {
    Route::view('/get-categories-products', 'home.products.index')->name('product.categories');
    Route::get('/get-products/{id}', [ProductController::class, 'getProductCategory'])->name('category.product');
    Route::get('/get-sub-categories-products/{category_name}', [ProductController::class, 'getSubProductCategory'])->name('get.sub.product');
    Route::get('/get-product-details/{id}', [ProductController::class, 'getProductDetails'])->name('product.show');
    Route::post('/reach-out', [ProductController::class, 'reachOut'])->name('client.reachout')->middleware('auth');
    Route::get('/get-auction-dates', [ProductController::class, 'getAuctionDates'])->name('getDateDynamically');


        #value asset

        Route::get('/value-asset', [ProductController::class, 'valueAsset'])->name('value.vehicle');
        Route::post('/value-asset', [ProductController::class, 'saveValuedAsset'])->name('value.asset');

    #auction routes....
        Route::get('/get-auction', [ProductController::class, 'getAuctionCars'])->name('get.auction.cars');

        #comment routes....

        Route::post('/post-a-comment', [ProductController::class, 'comment'])->name('post.comment')->middleware('auth');

        #scrapy yards...

        Route::view('/scrapy-yard', 'home.scarapy-yard')->name('scrapy-yard');
        Route::view('/parts', 'home.parts')->name('parts');
        Route::view('/stolen-cars', 'home.stolen-cars')->name('stolen');
        Route::view('/blacklist', 'home.blacklist')->name('blacklist');
        Route::view('/sell-a-car', 'home.sell-a-car')->name('sell');


        #usserProfile
        Route::get('/user/profile/{userId}', [UserController::class, 'showProfile'])->name('user.profile');


    });
});


Route::post('/admin/login', [AdminController::class, 'login'])->name('process.login');
Route::get('/admin/login', [AdminController::class, 'showlogin'])->name('admin.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('process.logout');

Route::prefix('admin')->middleware('auth', 'admin', 'notify')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/category', [CategoryController::class, 'storeCategory'])->name('admin.category.create');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::get('/post-a-product', [CategoryController::class, 'postProduct'])->name('post.product');

    #Subcategory Routes

    Route::post('/subcategory', [CategoryController::class, 'insertSubcategory'])->name('admin.subcategory.create');
    Route::delete('/subcategory/delete/{id}', [CategoryController::class, 'deleteSubcategory'])->name('admin.subcategory.delete');


    #user Routes

    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/all', [UserController::class, 'indexAll'])->name('admin.users.all');
    Route::post('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::delete('/users/delete/{id}', [UserController::class, 'deleteUsers'])->name('admin.users.delete');
    Route::put('/users/block/{id}', [UserController::class, 'toggleBlockUsers'])->name('admin.users.block');


     #Property Routes

     Route::get('/products', [ProductController::class, 'index'])->name('admin.product');
     Route::post('/products/create', [ProductController::class, 'create'])->name('admin.product.create');
     Route::get('/products/all', [ProductController::class, 'indexAll'])->name('admin.product.all');
     Route::put('/products/activate/{id}', [ProductController::class, 'toggleBlockProduct'])->name('admin.product.activate');
     Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');


     #Brands

     Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands');
     Route::post('/brands/create', [BrandController::class, 'store'])->name('admin.brands.create');
     Route::delete('/brands/delete/{id}', [BrandController::class, 'deleteBrand'])->name('admin.brand.delete');


     Route::get('/vehicle', [ProductController::class, 'index'])->name('admin.vehicle')->middleware('profile.complete');
     Route::post('/vehicle/create', [ProductController::class, 'store'])->name('admin.vehicle.create');
     Route::delete('/vehicle/delete/{id}', [ProductController::class, 'deleteVehicle'])->name('admin.vehicle.delete');
     Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->name('admin.vehicle.getSubcategories');
    Route::get('/get-vehicle/{id}', [ProductController::class, 'showProductRecords'])->name('admin.edit.product');
    Route::put('/update-vehicle/{id}', [ProductController::class, 'updateProduct'])->name('admin.vehicle.update');



     #notification..
     Route::get('/read', [AdminController::class, 'markAsRead'])->name('mark_As_read');

     #reports view all reports
     Route::get('/reports/all', [ReportController::class, 'viewAllReports'])->name('view.reports');
     Route::delete('/reports/delete/{id}', [ReportController::class, 'delete'])->name('admin.reports.delete');



    #requests view all requests
    Route::get('/requests/all', [ReportController::class, 'viewAllRequests'])->name('view.requests');
    Route::delete('/requests/delete/{id}', [ReportController::class, 'deleteRequests'])->name('admin.requests.delete');




     #Aunction

    Route::get('/live-auction/display', [ProductController::class, 'createAuction'])->name('admin.auction');
    Route::post('/live-auction/create', [ProductController::class, 'saveAuction'])->name('admin.auction.create');
//    Route::delete('/vehicle/delete/{id}', [ProductController::class, 'deleteVehicle'])->name('admin.vehicle.delete');
//    Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->name('admin.vehicle.getSubcategories');

    Route::view('/incomplete', 'admin.profile-incomplete')->name('profile.incomplete');
    Route::get('/user/profile', [UserController::class, 'ShowDashboardProfile'])->name('admin.profile');


    Route::view('/editlist', 'admin.edit-listing')->name('edit.listing');
    Route::get('/evaluate-all', [AdminController::class, 'getEvaluations'])->name('evaluate.all');

    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update.profile');


});
