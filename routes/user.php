<?php

use App\Http\Controllers\UserDashboard\Dashboard;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->middleware( 'notify', 'auth')->group(function () {

    Route::get('/index', [Dashboard::class, 'index'])->name('user.index');
    Route::get('/product-create', [Dashboard::class, 'product_create'])->middleware('userProfileCompleted')->name('user.product.index');
    Route::post('/save-user-product', [Dashboard::class, 'product_save'])->name('user.product.save');
    Route::delete('/product/delete/{id}', [Dashboard::class, 'delete_product'])->name('users.product.delete');
    Route::get('/logout', [Dashboard::class, 'logout'])->name('users.logout');
    Route::get('/get-all-products', [Dashboard::class, 'getAllProducts'])->name('user.products.all');
    Route::view('/incomplete/profile', 'users.incomplete')->name('users.modal.messages');
    Route::get('/user/profile', [Dashboard::class, 'ShowDashboardProfile'])->name('user.dashboard.profile');
    Route::post('/update-profile', [Dashboard::class, 'updateProfile'])->name('users.update.profile');
    Route::get('/get-subcategories/{categoryId}', [Dashboard::class, 'getSubcategories'])->name('admin.vehicle.getSubcategories');
    Route::get('/products/details/{id}', [Dashboard::class, 'product_details'])->name('users.products.details');

    Route::get('/message/all', [Dashboard::class, 'allMessages'])->name('all.message.users');
    Route::get('/message/{id}', [Dashboard::class, 'allMessagesById'])->name('users.all.message.id');
    Route::delete('/message/delete{id}', [Dashboard::class, 'deleteMessage'])->name('users.all.message.delete');
});
