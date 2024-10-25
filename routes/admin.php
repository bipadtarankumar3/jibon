<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\BrrowersController;
use App\Http\Controllers\admin\DemandSheetController;
use App\Http\Controllers\admin\WalletController;
use App\Http\Controllers\admin\MarketController;
use App\Http\Controllers\admin\LoanTypeController;
use App\Http\Controllers\admin\UserManagementController;

Route::get('login', [AdminAuthController::class, 'login'])->name('login');
Route::post('admin-login-action', [AdminAuthController::class, 'adminLoginAction']);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['App\Http\Middleware\AdminAuth']], function () {
    Route::get('dashboard', [AdminAuthController::class, 'dashboard']);
    Route::get('profile', [AdminAuthController::class, 'profile']);
    Route::put('profile/update', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
    Route::put('password/update', [AdminAuthController::class, 'updatePassword'])->name('password.update');
    Route::get('logout', [AdminAuthController::class, 'logout']);

    // Wallet Routes
    Route::get('demand_sheet/index', [DemandSheetController::class, 'index'])->name('demand_sheet.index');
    Route::get('brrowers.index', [BrrowersController::class, 'index'])->name('brrowers.index');
    Route::get('brrowers.create', [BrrowersController::class, 'create'])->name('brrowers.create');
    Route::post('brrowers.store', [BrrowersController::class, 'store'])->name('brrowers.store');
    Route::get('my_wallet', [WalletController::class, 'index'])->name('wallets.index');
    Route::post('wallets', [WalletController::class, 'store'])->name('wallets.store');
    Route::get('wallets/{wallet}/edit', [WalletController::class, 'edit'])->name('wallets.edit');
    Route::put('wallets/{wallet}', [WalletController::class, 'update'])->name('wallets.update');
    Route::get('wallets/{wallet}/delete', [WalletController::class, 'destroy'])->name('wallets.destroy');

   


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
