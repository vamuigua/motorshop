<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        $user = Auth::user();
        $cars = Car::all()->count();
        $car_makes = CarMake::all()->count();
        $car_models = CarModel::all()->count();
        return view('admin.dashboard', compact('user', 'cars', 'car_makes', 'car_models'));
    }
}
