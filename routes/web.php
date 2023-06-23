<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomerReviewController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ServicesImageController;
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

Route::get('/about', function () {
    return view('about');
});


Route::get('/home',  [HomeController::class, 'index'])->name('home');
Route::get('/service/{id}', [HomeController::class, 'showService'])->name('service.details.show');
Route::get('/services', [HomeController::class, 'showServices'])->name('all.services.show');
Route::get('/payment/{id}', [HomeController::class, 'payment'])->name('payment.show');
Route::post('/payment/create', [HomeController::class, 'paymentAdd'])->name('payment.create');
Route::post('/customer-reviews', [CustomerReviewController::class, 'store'])->name('customer-reviews.store.user');

require __DIR__ . '/auth.php';
Route::get('set-locale/{locale}', [LocaleController::class, 'setLocale'])->name('set.locale');
Route::group(['middleware' => ['auth'], 'prefix' => '/admin'], function () {

    Route::view('/users', 'admin.users.index')->name('users');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('customer-reviews', CustomerReviewController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/services', ServicesController::class);
    Route::resource('/service_images', ServicesImageController::class);
});
