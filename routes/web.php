<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StolenCarController;
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
Route::get('/countdown', [ProductController::class, 'showCountdown']);
Route::get('/refresh-csrf', function() {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::get('/multi-select-form', [ProductController::class, 'showForm'])->name('show.form');
Route::post('/multi-select-form', [ProductController::class, 'handleForm'])->name('handle.form');
Route::get('/blog', [ProductController::class, 'showBlog'])->name('show.blog');
Route::get('/blog/{id}', [ProductController::class, 'showBlogById'])->name('show.blog.id');
Route::post('/update-profile/user', [UserController::class, 'updateProfile'])->name('update.profile.user');

Route::group(['middleware' => ['showNavBar']], function () {


    Route::get('/contact', function () {
        return view('home.contact');
    });

    Route::get('/about', function () {
        return view('home.about');
    });


    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/report', [ReportController::class, 'viewReport'])->name('report.show');
    Route::post('/report/user', [ReportController::class, 'store'])->name('report.create')->middleware('auth');


    #request car

    Route::get('/request-a-car', [ReportController::class, 'viewRequest'])->name('request.show')->middleware('auth');
    Route::post('/request/user', [ReportController::class, 'saveCarRequest'])->name('save-request')->middleware('auth');
    Route::get('/search-asset', [ProductController::class, 'searchProduct'])->name('search');



    Route::get('/groups/{id}', [GroupController::class, 'index'])->name('groups');
    Route::get('/groups/members/{group_id}', [GroupController::class, 'group_activities'])->name('groups.activities');
    Route::post('/groups/post', [GroupController::class, 'create_posts'])->name('create_posts_users');
    Route::get('/groups/{group}/join', [GroupController::class, 'join'])->middleware('auth')->name('groups.join');
    Route::view('/group/members', 'home.groups.members')->name('group.members');
    Route::get('/group/members/{id}', [GroupController::class, 'get_group_members'])->name('groups_members');

    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->middleware('auth')->name('posts.like');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');


    #Return interface of signup pages... Authentication routes
    Route::get('/register/dealer', [HomeController::class, 'register_dealer'])->name('dealer.register');
    Route::get('/register/service-provider', [HomeController::class, 'register_provider'])->name('service_provider.register');
    Route::get('/register/buyer', [HomeController::class, 'register_buyer'])->name('buyer.register');
//    Route::view('/register/buyer', 'home.signup.user')->name('buyer.register');

    Route::post('/save-register-dealer', [HomeController::class, 'saveDealer'])->name('save.register.dealer');
    Route::post('/save-register-user', [HomeController::class, 'saveUser'])->name('save.register.user');
    Route::post('/save-register-buyer', [HomeController::class, 'saveBuyer'])->name('save.register.buyer');

    Route::view('/login', 'home.login')->name('login');
    Route::post('/login', [HomeController::class, 'loginUser'])->name('login.user');
    Route::view('/register', 'home.register')->name('register');
    Route::post('/register', [HomeController::class, 'register'])->name('register.user');
    Route::post('/update-auction-status', [ProductController::class, 'updateAuctionStatus'])->name('updateAuctionStatus');

    #products.....

    Route::prefix('product')->group(function () {
    Route::view('/get-categories-products', 'home.products.index')->name('product.categories');
    Route::get('/get-products/{id}', [ProductController::class, 'getProductCategory'])->name('category.product');
    Route::get('/get-sub-categories-products/{category_name}', [ProductController::class, 'getSubProductCategory'])->name('get.sub.product');
    Route::get('/get-product-details/{id}', [ProductController::class, 'getProductDetails'])->name('product.show');
    Route::post('/reach-out', [ProductController::class, 'reachOut'])->name('client.reachout')->middleware('auth');
    Route::get('/get-auction-dates', [ProductController::class, 'getAuctionDates'])->name('getDateDynamically');
    Route::post('/store-countdown-data', [ProductController::class, 'countdown'])->name('store.countdown.data');

        #value asset

        Route::get('/value-asset', [ProductController::class, 'valueAsset'])->name('value.vehicle');
        Route::post('/value-asset', [ProductController::class, 'saveValuedAsset'])->name('value.asset');

    #auction routes....
        Route::get('/get-auction', [ProductController::class, 'getAuctionCars'])->name('get.auction.cars');
        Route::get('/get-auction/{id}', [ProductController::class, 'getAuctionCarsById'])->name('get.auction.cars.id');
        Route::post('/bid-on-asset', [ProductController::class, 'BidForAuction'])->name('bid_auction');

        #comment routes....

        Route::post('/post-a-comment', [ProductController::class, 'comment'])->name('post.comment')->middleware('auth');
        Route::post('/post-a-bussiness-review', [ProductController::class, 'bussinessReview'])->name('post.reviews')->middleware('auth');
        Route::post('/post-a-part-view', [ProductController::class, 'partReview'])->name('part.comment.review')->middleware('auth');
        #scrapy yards...

        Route::view('/scrapy-yard', 'home.scarapy-yard')->name('scrapy-yard');
//        Route::view('/parts', 'home.parts')->name('parts');
        Route::view('/blacklist', 'home.blacklist')->name('blacklist');
        Route::view('/sell-a-car', 'home.sell-a-car')->name('sell');

        Route::get('/part/all', [PartController::class, 'getPartView'])->name('parts');
        Route::get('/view-part/{id?}', [PartController::class, 'viewPartDetails'])->name('view.parts');
        Route::post('/search-part', [HomeController::class, 'searchPart'])->name('part.search');


//        Route::view('/stolen-cars', 'home.stolen-cars')->name('stolen');
        Route::get('/stolen-cars/{search?}', [StolenCarController::class, 'getStolenCars'])->name('stolen');

//        Route::get('/search/stolen', [StolenCarController::class, 'searchStolen'])->name('search.car.stolen');

        Route::view('auction_view', 'home.auction_view')->name('auction_view');






        #usserProfile
        Route::get('/user/profile/{userId}', [UserController::class, 'showProfile'])->name('user.profile');
//        Route::view('/all/providers', 'home.service-provider.index')->name('provider.all');
        Route::get('/dealers/all', [HomeController::class, 'getAllDealers'])->name('dealers.all');
        Route::get('/all/providers', [HomeController::class, 'service_provider'])->name('provider.all');
        Route::get('/all/providers/search', [HomeController::class, 'service_provider_search'])->name('service_provider_search');



    });
});


Route::post('/admin/login', [AdminController::class, 'login'])->name('process.login');
Route::get('/admin/login', [AdminController::class, 'showlogin'])->name('admin.login');
Route::get('/logout', [AdminController::class, 'logout'])->name('process.logout');

Route::get('/user/logout', [ProductController::class, 'userLogout'])->name('user.logout');

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
     Route::post('/products/creates', [ProductController::class, 'create'])->name('admin.product.create');
     Route::get('/products/all', [ProductController::class, 'indexAll'])->name('admin.product.all');
//     Route::put('/products/activate/{id}', [ProductController::class, 'toggleBlockProduct'])->name('admin.product.activate');
    Route::post('/decline-product', [ProductController::class, 'decline_product_request'])->name('decline_product_request');
    Route::post('/approve-product', [ProductController::class, 'approve_product_request'])->name('approve_product_request');
     Route::delete('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('admin.product.delete');
    Route::post('/approve-car-part', [ProductController::class, 'approve_part_request'])->name('approve_part_request');
    Route::post('/decline-car-part', [ProductController::class, 'decline_part_request'])->name('decline_part_request');


     #Brands
     Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands');
     Route::post('/brands/create', [BrandController::class, 'store'])->name('admin.brands.create');
     Route::delete('/brands/delete/{id}', [BrandController::class, 'deleteBrand'])->name('admin.brand.delete');



    Route::get('/service', [BrandController::class, 'show_service'])->name('admin.service');
    Route::post('/service/create', [BrandController::class, 'save_service'])->name('admin.service.create');
    Route::delete('/service/delete/{id}', [BrandController::class, 'delete_service'])->name('admin.service.delete');




      #uploading_product_routes
     Route::get('/product/create', [ProductController::class, 'index'])->name('admin.vehicle')->middleware('profile.complete');
     Route::post('/product/create', [ProductController::class, 'store'])->name('create_product_admin');
     Route::delete('/product/delete/{id}', [ProductController::class, 'deleteVehicle'])->name('admin.vehicle.delete');
     Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->name('admin.vehicle.getSubcategories');
    Route::get('/get-vehicle/{id}', [ProductController::class, 'showProductRecords'])->name('admin.edit.product');
    Route::put('/update-vehicle/{id}', [ProductController::class, 'updateProduct'])->name('admin.vehicle.update');

     #notification..
     Route::get('/read/{id}', [AdminController::class, 'markAsRead'])->name('mark_As_read');

  #admin stolen cars.........
    Route::get('/stolen/car', [StolenCarController::class, 'showuploadpage'])->name('admin.stolen.all');
    Route::get('/stolen/all', [StolenCarController::class, 'index'])->name('admin.stolen.all');
    Route::post('/stolen/car', [StolenCarController::class, 'store'])->name('admin.stolen.create');
    Route::delete('/stolen/delete/{id}', [StolenCarController::class, 'delete'])->name('admin.delete.stolen');
    Route::get('/cartheft/{id}/approve', [StolenCarController::class, 'approveStolen'])->name('theft.approve');
    Route::get('/cartheft/{id}/unapprove', [StolenCarController::class, 'unapproveStolenCar'])->name('theft.unapprove');


     #reports view all reports
     Route::get('/reports/all', [ReportController::class, 'viewAllReports'])->name('view.reports');
     Route::delete('/reports/delete/{id}', [ReportController::class, 'delete'])->name('admin.reports.delete');



    #requests view all requests
    Route::get('/requests/all', [ReportController::class, 'viewAllRequests'])->name('view.requests');
    Route::delete('/requests/delete/{id}', [ReportController::class, 'deleteRequests'])->name('admin.requests.delete');


    #messages

    Route::get('/message/all', [AdminController::class, 'allMessages'])->name('all.message');
    Route::get('/message/{id}', [AdminController::class, 'allMessagesById'])->name('all.message.id');
    Route::delete('/message/delete{id}', [AdminController::class, 'deleteMessage'])->name('all.message.delete');




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

    Route::get('/part', [PartController::class, 'createParts'])->name('admin.parts');
    Route::post('/part', [\App\Http\Controllers\PartController::class, 'store'])->name('savePart');
    Route::get('/get-part', [\App\Http\Controllers\PartController::class, 'getAllParts'])->name('admin.parts.all');
    Route::delete('/get-part/{id)', [\App\Http\Controllers\PartController::class, 'deletePart'])->name('admin.parts.delete');
    Route::get('/category-part-all', [PartController::class, 'allPartCategory'])->name('admin.parts.carpartcategory');
    Route::post('/category-part', [\App\Http\Controllers\PartController::class, 'createPartcategory'])->name('admin.parts.category');
    Route::delete('/category-delete/{id}', [\App\Http\Controllers\PartController::class, 'deletePartCategory'])->name('admin.parts.delete');

    Route::get('/parts/{id}/approve', [PartController::class, 'approvePart'])->name('parts.approve');
    Route::get('/parts/{id}/unapprove', [PartController::class, 'unapprovePart'])->name('parts.unapprove');




    Route::get('/reports/complaints/{id}', [AdminController::class, 'reportComplaint'])->name('admin.complaint.details');
    Route::get('/requests/details/{id}', [AdminController::class, 'careRequests'])->name('admin.requests.details');
    Route::get('/products/details/{id}', [AdminController::class, 'productDetails'])->name('admin.products.details');
    Route::get('/auction/all', [AdminController::class, 'auctionAll'])->name('admin.auction.all');
    Route::delete('/auction/delete/{id}', [ProductController::class, 'deleteAuction'])->name('admin.auction.delete');
    Route::get('/bidders-activity', [AdminController::class, 'interestedBidders'])->name('admin.bidders.interested');
    Route::delete('/bid/delete/{id}', [ProductController::class, 'deleteBid'])->name('admin.bid.delete');
//    Route::get('/asset_evaluation/details/{id}', [AdminController::class, 'productDetails'])->name('admin.products.details');

    Route::get('/sold/items', [ProductController::class, 'sold_items'])->name('sold.all.admin');
    Route::get('/sold/items/{id}', [ProductController::class, 'sold_items_by_id'])->name('sold_by_id.admin');


    Route::get('/blog', [BlogController::class, 'showBlog'])->name('blog_creation_page');
    Route::get('/blog/all', [BlogController::class, 'getAllBlogs'])->name('get_all_blogs_admin');
    Route::post('/blog', [BlogController::class, 'create_blog'])->name('create_blog_admin');
    Route::delete('/blog/{id}', [BlogController::class, 'delete_blog'])->name('delete_blog_admin');
    Route::get('/blog/{id}', [BlogController::class, 'blog_details'])->name('view_blog_details_admin');
    Route::post('/update-blog/{id}', [BlogController::class, 'update_blog'])->name('update_blog');



    Route::get('/group', [BlogController::class, 'showGroup'])->name('group_creation_page');
    Route::post('/group', [BlogController::class, 'create_group'])->name('save_group');
    Route::get('/group/all', [BlogController::class, 'getAllGroups'])->name('get_all_group_admin');
    Route::delete('/group/{id}', [BlogController::class, 'delete_group'])->name('delete_group');

// routes/web.php
    Route::post('/toggle-featured', [ProductController::class, 'toggleFeatured'])->name('toggle_featured');
    Route::post('/toggle-featured/user', [ProductController::class, 'featureUser'])->name('toggle_featured_user');


    //Paystack Route
    Route::get('paystack-onboard', [PaystackController::class, 'redirectToGateway'])->name('paystack.init');
    Route::get('paystack-payment-success',
        [PaystackController::class, 'handleGatewayCallback'])->name('paystack.success');


});
