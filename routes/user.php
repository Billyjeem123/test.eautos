<?php

use App\Http\Controllers\UserDashboard\Dashboard;
use Illuminate\Support\Facades\Route;





Route::prefix('users')->middleware( 'admin', 'notify', 'auth')->group(function () {

    Route::get('/index', [Dashboard::class, 'index'])->name('user.index');
    Route::get('/product-create', [Dashboard::class, 'product_create'])->name('user.product.index');
    Route::get('/save-user-product', [Dashboard::class, 'product_save'])->name('user.product.save');
    Route::get('/logout', [Dashboard::class, 'logout'])->name('users.logout');
    Route::get('/get-all-products', [Dashboard::class, 'getAllProducts'])->name('user.products.all')->middleware('profile.complete');

});
