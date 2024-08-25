<?php

use App\Http\Controllers\UserDashboard\Dashboard;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->middleware( 'userNotify', 'auth', 'strictlyUsers')->group(function () {

    Route::get('/index', [Dashboard::class, 'index'])->name('user.index');
    Route::get('/verify', [Dashboard::class, 'verify'])->name('user.verify');
    Route::get('/product-create', [Dashboard::class, 'product_create'])->middleware('userProfileCompleted')->name('user.product.index');
    Route::post('/save-user-product', [Dashboard::class, 'product_save'])->name('user.product.save');
    Route::delete('/product/delete/{id}', [Dashboard::class, 'delete_product'])->name('users.product.delete');
    Route::get('/logout', [Dashboard::class, 'logout'])->name('users.logout');
    Route::get('/get-all-products', [Dashboard::class, 'getAllProducts'])->name('user.products.all');
    Route::view('/incomplete/profile', 'users.incomplete')->name('users.modal.messages');
    Route::get('/user/profile', [Dashboard::class, 'ShowDashboardProfile'])->name('user.dashboard.profile');
    Route::post('/update-profile', [Dashboard::class, 'updateProfile'])->name('users.update.profile');
    Route::get('/get-subcategories/{categoryId}', [Dashboard::class, 'getSubcategories'])->name('users.getSubcategories');
    Route::get('/products/details/{id}', [Dashboard::class, 'product_details'])->name('users.products.details');

    Route::get('/message/all', [Dashboard::class, 'allMessages'])->name('all.message.users');
    Route::get('/message/{id}', [Dashboard::class, 'allMessagesById'])->name('users.all.message.id');
    Route::delete('/message/delete{id}', [Dashboard::class, 'deleteMessage'])->name('users.all.message.delete');
    Route::get('/part', [Dashboard::class, 'part_page'])->name('users.parts');
    Route::post('/save-part', [Dashboard::class, 'save_parts'])->name('save_parts');
    Route::get('/get-all-parts', [Dashboard::class, 'get_all_parts'])->name('users.all.parts');
    Route::delete('/get-part/{id)', [Dashboard::class, 'delete_part'])->name('users.parts.delete');

    Route::get('/reports/all', [Dashboard::class, 'view_all_reports'])->name('users.view.reports');
    Route::get('/reports/complaints/{id}', [Dashboard::class, 'view_report_complaint'])->name('user.complaint.details');


    Route::get('/requests/all', [Dashboard::class, 'view_all_requests'])->name('users.view.requests');
    Route::delete('/requests/delete/{id}', [Dashboard::class, 'delete_request'])->name('users.requests.delete');
    Route::get('/evaluate-all', [Dashboard::class, 'get_asset_evaluation'])->name('users.evaluate.all');
    Route::get('/sold/items', [Dashboard::class, 'sold_items'])->name('sold.all');
    Route::get('/sold/items/{id}', [Dashboard::class, 'sold_items_by_id'])->name('sold_by_id');
    Route::get('/stolen/car', [Dashboard::class, 'showuploadpage'])->name('users.stolen.view');
    Route::post('/stolen/car', [Dashboard::class, 'save_stolen_car'])->name('users.stolen_car');
    Route::get('/stolen/all', [Dashboard::class, 'show_all_stolen_cars'])->name('users.stolen.all');
    Route::get('/read/{id}', [Dashboard::class, 'markAsRead'])->name('mark_As_read');
});
