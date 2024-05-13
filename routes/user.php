<?php

use App\Http\Controllers\UserDashboard\Dashboard;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->middleware( 'notify', 'auth')->group(function () {

    Route::get('/index', [Dashboard::class, 'index'])->name('user.index');
    Route::get('/product-create', [Dashboard::class, 'product_create'])->middleware('userProfileCompleted')->name('user.product.index');
    Route::get('/save-user-product', [Dashboard::class, 'product_save'])->name('user.product.save');
    Route::get('/logout', [Dashboard::class, 'logout'])->name('users.logout');
    Route::get('/get-all-products', [Dashboard::class, 'getAllProducts'])->name('user.products.all')->middleware('profile.complete');
    Route::view('/incomplete/profile', 'users.incomplete')->name('user.profile.incomplete');
    Route::get('/user/profile', [Dashboard::class, 'ShowDashboardProfile'])->name('user.dashboard.profile');
    Route::post('/update-profile', [Dashboard::class, 'updateProfile'])->name('users.update.profile');

});
