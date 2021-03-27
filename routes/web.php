<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CarMakeController;
use App\Http\Controllers\Admin\CarModelController;

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

// Static Page ROUTES
Route::get('/about', function () {
    return view('static/about');
})->name('about');

Route::get('/blog', function () {
    return view('static/blog');
})->name('blog');

Route::get('/faq', function () {
    return view('static/FAQ');
})->name('faq');

Route::get('/terms', function () {
    return view('static/terms');
})->name('terms');

Route::get('/team', function () {
    return view('static/team');
})->name('team');

Route::get('/contact', function () {
    return view('static/contact-us');
})->name('contact-us');

Route::get('/cars', function () {
    return view('static/cars');
})->name('cars');
// END Static Page ROUTES

// Main Page/Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Auth::routes();

// Admin routes
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Car Routes
Route::resource('admin/cars', 'App\Http\Controllers\Admin\CarsController');
Route::post('/admin/cars/media', [CarsController::class, 'storeMedia'])->name('cars.storeMedia');

// Car-Make routes
Route::resource('admin/car-make', 'App\Http\Controllers\Admin\CarMakeController');
Route::post('/admin/new_car_make', [CarMakeController::class, 'addCarMake']);
Route::get('/admin/all_car_makes', [CarMakeController::class, 'getAllCarMakes']);

// Car-Model routes
Route::resource('admin/car-model', 'App\Http\Controllers\Admin\CarModelController');
Route::post('/admin/new_car_model', [CarModelController::class, 'addCarModel']);
Route::get('/admin/all_car_models', [CarModelController::class, 'getAllCarModels']);
