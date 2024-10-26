<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\admin\BrrowersController;
use App\Http\Controllers\admin\DemandSheetController;
use App\Http\Controllers\admin\WalletController;

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
    Route::get('my_wallet', [WalletController::class, 'index'])->name('wallets.index');
    Route::post('wallets', [WalletController::class, 'store'])->name('wallets.store');
    Route::get('wallets/{wallet}/edit', [WalletController::class, 'edit'])->name('wallets.edit');
    Route::put('wallets/{wallet}', [WalletController::class, 'update'])->name('wallets.update');
    Route::get('wallets/{wallet}/delete', [WalletController::class, 'destroy'])->name('wallets.destroy');
});
