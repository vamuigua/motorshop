<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarsDisplayController;
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

// Home page route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Static Page ROUTES
Route::get('/about', function () {
    return view('static/about');
})->name('about');

Route::get('/faq', function () {
    return view('static/FAQ');
})->name('faq');

Route::get('/terms', function () {
    return view('static/terms');
})->name('terms');

Route::get('/contact', function () {
    return view('static/contact-us');
})->name('contact-us');
// END Static Page ROUTES


// All cars page route
Route::get('/cars', [CarsDisplayController::class, 'index'])->name('cars');
// Route for searching for vehicles
Route::get('/results', [CarsDisplayController::class, 'searchForm'])->name('search');
// Individual car-details display route
Route::get('/cars/{id}', [CarsDisplayController::class, 'show'])->name('car-details');


// AUTHENTICATION ROUTES
Auth::routes([
    'register' => false,    // removes the Register route & view page
]);

// ADMIN ROUTES
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'roles',
        "roles" => ['Admin']
    ],
    function () {
        // Admin dashboard route
        Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Car Routes
        Route::resource('cars', 'App\Http\Controllers\Admin\CarsController');
        Route::post('cars/media', [CarsController::class, 'storeMedia'])->name('cars.storeMedia');

        // Car-Make routes
        Route::resource('car-make', 'App\Http\Controllers\Admin\CarMakeController');
        Route::post('new_car_make', [CarMakeController::class, 'addCarMake']);
        Route::get('all_car_makes', [CarMakeController::class, 'getAllCarMakes']);

        // Car-Model routes
        Route::resource('car-model', 'App\Http\Controllers\Admin\CarModelController');
        Route::post('new_car_model', [CarModelController::class, 'addCarModel']);
        Route::get('all_car_models', [CarModelController::class, 'getAllCarModels']);

        // Car-Features routes
        Route::resource('features', 'App\Http\Controllers\Admin\FeaturesController');

        // Role routes
        Route::resource('roles', 'App\Http\Controllers\Admin\RolesController');
    }
);
// END OF ADMIN ROUTES
