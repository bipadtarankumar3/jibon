<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\MarketController;
use App\Http\Controllers\admin\LoanTypeController;
use App\Http\Controllers\admin\UserManagementController;

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


    Route::get('/markets', [MarketController::class, 'markets'])->name('markets.index');
    Route::post('/markets', [MarketController::class, 'store'])->name('markets.store');
    Route::put('/markets/{id}', [MarketController::class, 'update'])->name('markets.update');
    Route::delete('/markets/{id}', [MarketController::class, 'destroy'])->name('markets.destroy');

    Route::get('/loan_types', [LoanTypeController::class, 'loan_types'])->name('loan_types.index');
    Route::resource('loan-types', LoanTypeController::class);



    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index'); // Display users
    Route::get('/user_add', [UserManagementController::class, 'user_add']); // Create user
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store'); // Create user
    Route::get('/users/{id}/edit', [UserManagementController::class, 'edit'])->name('users.edit'); // Edit user
    Route::post('/users/{id}', [UserManagementController::class, 'update'])->name('users.update'); // Update user
    Route::delete('/users/{id}', [UserManagementController::class, 'destroy'])->name('users.destroy'); // Del


    
   

    // Route::group(['prefix' => 'payout', 'as' => 'payout.'], function () {
    //     Route::get('list', [PayoutManagementController::class, 'payoutList']);
       
    // });


 
});
