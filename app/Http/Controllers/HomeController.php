<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    /**
     * Show the application Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = Car::latest()->where('isFeatured', '1')->take(3)->get();
        return view('home', compact('cars'));
    }
}
