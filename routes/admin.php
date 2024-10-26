<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminAuthController;

Route::get('login', [AdminAuthController::class, 'login'])->name('login');
Route::get('admin/login', [AdminAuthController::class, 'login']);
Route::get('back-to-admin', [AdminAuthController::class, 'backToAdmin']);
Route::post('admin-login-action', [AdminAuthController::class, 'adminLoginAction']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['App\Http\Middleware\AdminAuth']], function () {
    Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('profile', [AdminAuthController::class, 'profile']);
    Route::put('/admin/profile/update', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('/admin/password/update', [AdminAuthController::class, 'updatePassword'])->name('password.update');
    Route::get('logout', [AdminAuthController::class, 'logout']);


    Route::get('my_wallet', [AdminAuthController::class, 'my_wallet']);
    Route::get('add_market', [AdminAuthController::class, 'add_market']);


    
   

    // Route::group(['prefix' => 'payout', 'as' => 'payout.'], function () {
    //     Route::get('list', [PayoutManagementController::class, 'payoutList']);
       
    // });


 
});
