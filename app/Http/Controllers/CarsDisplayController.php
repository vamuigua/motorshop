<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarsDisplayController extends Controller
{
    /**
     * Display a listing of all cars.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perpage = 15;
        $car = new Car();
        $cars = Car::latest()->paginate($perpage);
        return view('static.cars', compact('car', 'cars'));
    }

    /**
     * Returns a list of searched cars.
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\View\View
     */
    public function searchForm(Request $request)
    {
        $perPage = 15;
        $car = new Car();

        // Retrieve all the search properties
        $condition_type = $request->get('condition_type');
        $body_type = $request->get('body_type');
        $car_make_id = $request->get('car_make_id');
        $car_model_id = $request->get('car_model_id');

        $price = $request->get('price');        // price value example (string) "2000000;8000000"
        $price_range = explode(";", $price);    // converts to array ["2000000", "8000000"]
        $lowest_price_range = $price_range[0];
        $highest_price_range = $price_range[1];

        $mileage = $request->get('mileage');
        $mileage_range = explode(":", $mileage);
        $lowest_mileage = $mileage_range[0];
        $highest_mileage = $mileage_range[1];

        $engine_size = $request->get('engine_size');
        $engine_size_range = explode(":", $engine_size);
        $lowest_engine_size = $engine_size_range[0];
        $highest_engine_size = $engine_size_range[1];

        $color_type = $request->get('color_type');
        $fuel_type = $request->get('fuel_type');
        $transmission_type = $request->get('transmission_type');
        $interior_type = $request->get('interior_type');
        $duty = $request->get('duty');
        $year = $request->get('year');
        $negotiable = $request->get('negotiable');

        //check to ensure that if no parameter is entered, then no results are rendered
        if (
            empty($condition_type) && empty($body_type) && empty($car_make_id)
            && empty($car_model_id) && empty($price) && empty($mileage)
            && empty($engine_size) && empty($color_type) && empty($fuel_type)
            && empty($transmission_type) && empty($interior_type)
            && empty($duty) && empty($year) && empty($negotiable)
        ) {
            return redirect()->back()->with('flash_message_error', "You did not select any search parameter.");
        } else {
            $cars = Car::when($condition_type, function ($query) {
                $query->where('condition_type', 'LIKE', '%' . request()->condition_type . '%');
            })->when($body_type, function ($query) {
                $query->where('body_type', 'LIKE', '%' . request()->body_type . '%');
            })->when($car_make_id, function ($query) {
                $query->where('car_make_id', 'LIKE', '%' . request()->car_make_id . '%');
            })->when($price, function ($query) use ($lowest_price_range, $highest_price_range) {
                $query->where('price', '>=', $lowest_price_range)
                    ->Where('price', '<=', $highest_price_range);
            })->when($mileage, function ($query) use ($lowest_mileage, $highest_mileage) {
                $query->where('mileage', '>=', $lowest_mileage)
                    ->Where('mileage', '<=', $highest_mileage);
            })->when($engine_size, function ($query) use ($lowest_engine_size, $highest_engine_size) {
                $query->where('engine_size', '>=', $lowest_engine_size)
                    ->Where('engine_size', '<=', $highest_engine_size);
            })->when($color_type, function ($query) {
                $query->where('color_type', 'LIKE', '%' . request()->color_type . '%');
            })->when($fuel_type, function ($query) {
                $query->where('fuel_type', 'LIKE', '%' . request()->fuel_type . '%');
            })->when($transmission_type, function ($query) {
                $query->where('transmission_type', 'LIKE', '%' . request()->transmission_type . '%');
            })->when($interior_type, function ($query) {
                $query->where('interior_type', 'LIKE', '%' . request()->interior_type . '%');
            })->when($duty, function ($query) {
                $query->where('duty', 'LIKE', '%' . request()->duty . '%');
            })->when($year, function ($query) {
                $query->where('year', 'LIKE', '%' . request()->year . '%');
            })->when($negotiable, function ($query) {
                $query->where('negotiable', 'LIKE', '%' . request()->negotiable . '%');
            })->latest()->paginate($perPage);

            return view('static.cars', compact('cars', 'car'));
        }
    }

    /**
     * Display the specified car resource.
     *
     * @param  Car $car
     * 
     * @return \Illuminate\View\View
     */
    public function show(Car $car)
    {
        $carImages =  $car->images();
        return view('static.car-details', compact('car', 'carImages'));
    }
}
