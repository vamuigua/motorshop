<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests;
use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CarsDisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = 15;
        $car = new Car();
        $carMakes = CarMake::with(['carModels'])->get();
        $cars = Car::latest()->simplePaginate($perpage);
        return view('static.cars', compact('car', 'cars', 'carMakes'));
    }
    
    public function searchForm(Request $request)
    {
        $car = new Car();
        $carMakes = CarMake::with(['carModels'])->get();

        $perPage = 15;

        $condition_type = $request->get('condition_type');
        $body_type = $request->get('body_type');
        $car_make_id = $request->get('car_make_id');
        $car_model_id = $request->get('car_model_id');
        $price = $request->get('price');
        $mileage = $request->get('mileage');
        $engine_size = $request->get('engine_size');
        $color_type = $request->get('color_type');
        $fuel_type = $request->get('fuel_type');
        $transmission_type = $request->get('transmission_type');
        $interior_type = $request->get('interior_type');
        $duty = $request->get('duty');
        $year = $request->get('year');
        $negotiable = $request->get('negotiable');

        //checks to ensure that if no parameter is entered then no results are rendered

        if (empty($condition_type) && empty($body_type) && empty($car_make_id) 
            && empty($car_model_id) && empty($price) && empty($mileage) 
            && empty($engine_size) && empty($color_type) && empty($fuel_type) 
            && empty($transmission_type) && empty($interior_type) 
            && empty($duty) && empty($year) && empty($negotiable)) {
            return redirect()->back()->with('info', "You didn't select any search any search.");
        }else {

            
        
            $cars = Car::where('condition_type', 'LIKE', '%' . request()->condition_type . '%')
                        ->when(request()->body_type, function($query) {
                            $query->where('body_type', request()->body_type);
                        })
                        ->when(request()->car_make_id, function($query) {
                            $query->where('car_make_id', 'LIKE', '%' . request()->car_make_id . '%');
                        })
                        ->when(request()->price, function($query) {
                            $query->where('price', 'LIKE', '%' . request()->price . '%');
                        })
                        ->when(request()->mileage, function($query) {
                            $query->where('mileage', 'LIKE', '%' . request()->mileage . '%');
                        })
                        ->when(request()->engine_size, function($query) {
                            $query->where('engine_size', 'LIKE', '%' . request()->engine_size . '%');
                        })
                        ->when(request()->color_type, function($query) {
                            $query->where('color_type', 'LIKE', '%' . request()->color_type . '%');
                        })
                        ->when(request()->fuel_type, function($query) {
                            $query->where('fuel_type', 'LIKE', '%' . request()->fuel_type . '%');
                        })
                        ->when(request()->transmission_type, function($query) {
                            $query->where('transmission_type', 'LIKE', '%' . request()->transmission_type . '%');
                        })
                        ->when(request()->interior_type, function($query) {
                            $query->where('interior_type', 'LIKE', '%' . request()->interior_type . '%');
                        })
                        ->when(request()->duty, function($query) {
                            $query->where('duty', 'LIKE', '%' . request()->duty . '%');
                        })
                        ->when(request()->year, function($query) {
                            $query->where('year', 'LIKE', '%' . request()->year . '%');
                        })
                        ->when(request()->negotiable, function($query) {
                            $query->where('negotiable', 'LIKE', '%' . request()->negotiable . '%');
                        })->latest()->simplePaginate($perPage);

            return view('static.cars',compact('cars', 'car', 'carMakes'));
        }                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = Car::findOrFail($id);
        $carImages =  $car->images();

        return view('static.results',compact('car', 'carImages'));
    }
}
