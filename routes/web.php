<?php

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
    return view('about/about');
});

Route::get('/blog', function () {
    return view('about/blog');
});


Route::get('/faq', function () {
    return view('about/FAQ');
});


Route::get('/terms', function () {
    return view('about/terms');
});


Route::get('/teams', function () {
    return view('about/team');
});

Route::get('/contact', function () {
    return view('contactinfo');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
