<?php

use App\Http\Controllers\web\WebViewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WebViewController::class, 'index'])->name('home');
Route::get('about-us', [WebViewController::class, 'aboutUs']);
Route::get('services', [WebViewController::class, 'services']);
Route::get('contact-us', [WebViewController::class, 'contactUs']);
Route::get('tour-details/{id}', [WebViewController::class, 'tourDetails']);
Route::get('exprience-details/{id}', [WebViewController::class, 'exprienceDetails']);
Route::get('property_details/{id}', [WebViewController::class, 'property_details']);
Route::get('payment/{hotel_id}/{room_id}', [WebViewController::class, 'payNow']);
Route::post('book-now', [WebViewController::class, 'bookNow']);
Route::get('tour-book-page/{id}', [WebViewController::class, 'tour_book_page']);
Route::post('tour-book-now', [WebViewController::class, 'tourBookNow']);
Route::post('exp-book-now', [WebViewController::class, 'expBookNow']);
Route::get('booking-status/{booking_id}', [WebViewController::class, 'bookingStatus']);
Route::get('tour-exprience-booking-status/{booking_id}', [WebViewController::class, 'TourExpbookingStatus']);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return "Cache is cleared";
});