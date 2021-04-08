<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests;

use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;
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
        $perpage = 1;

        $car = new Car();
        $carModel = new CarModel();
        $carMakes = CarMake::with(['carModels'])->get();
        $cars = Car::latest()->simplePaginate($perpage);

        $selectedcar = Car::first()->color_type;

        // $condition_type = $request->get('condition');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');
        // $body_type = $request->get('');

        // $car = Car::where('condition_type', 'LIKE', "%$condition_type%")->paginate(3);
        return view('static.cars', compact('car', 'cars', 'carModel', 'carMakes', 'selectedcar'));
    }

    public function searchForm(Request $request)
    {
        $perpage = 1;
        $car = new Car();
        $carModel = new CarModel();
        $carMakes = CarMake::with(['carModels'])->get();
        $cars = Car::latest()->simplePaginate($perpage);

        $condition_type = $request->get('condition');
        $body_type = $request->get('bodytype');
        $car_make = $request->get('car_make_id');
        $car_model = $request->get('car_model_id');
        $price = $request->get('price');
        $mileage = $request->get('mileage');
        $enginesize = $request->get('enginesize');
        $color_type = $request->get('colortype');
        $fuel_type = $request->get('fueltype');
        $transmission_type = $request->get('transmissiontype');
        $interior_type = $request->get('interiortype');
        $duty_type = $request->get('dutystatus');

        if (!empty($condition_type)|| !empty($body_type) || !empty($car_make) || !empty($car_model) || !empty($price) || !empty($mileage) || !empty($enginesize) || !empty($color_type) || !empty($fuel_type) || !empty($transmission_type) || !empty($interior_type) || !empty($duty_type)) {
            
            $car = Car::where('condition_type', 'LIKE', "%$condition_type%")
                ->orWhere('body_type', 'LIKE', "%$body_type%")
                ->orWhere('car_make_id', 'LIKE', "%$car_make%")
                ->orWhere('car_model_id', 'LIKE', "%$car_model%")
                ->orWhere('price', 'LIKE', "%$price%")
                ->orWhere('mileage', 'LIKE', "%$mileage%")
                ->orWhere('engine_size', 'LIKE', "%$enginesize%")
                ->orWhere('color_type', 'LIKE', "%$color_type%")
                ->orWhere('fuel_type', 'LIKE', "%$fuel_type%")
                ->orWhere('transmission_type', 'LIKE', "%$transmission_type%")
                ->orWhere('interior_type', 'LIKE', "%$interior_type%")
                ->orWhere('duty', 'LIKE', "%$duty_type%")     
                ->latest()->simplePaginate($perpage);
        }
        
        return view('static.results',compact('car', 'carModel', 'carMakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
