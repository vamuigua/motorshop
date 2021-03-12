<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cars = Car::where('car_make_id', 'LIKE', "%$keyword%")
                ->orWhere('car_model_id', 'LIKE', "%$keyword%")
                ->orWhere('year', 'LIKE', "%$keyword%")
                ->orWhere('mileage', 'LIKE', "%$keyword%")
                ->orWhere('body_type', 'LIKE', "%$keyword%")
                ->orWhere('condition_type', 'LIKE', "%$keyword%")
                ->orWhere('transmission_type', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('duty', 'LIKE', "%$keyword%")
                ->orWhere('negotiable', 'LIKE', "%$keyword%")
                ->orWhere('fuel_type', 'LIKE', "%$keyword%")
                ->orWhere('interior_type', 'LIKE', "%$keyword%")
                ->orWhere('color_type', 'LIKE', "%$keyword%")
                ->orWhere('engine_size', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cars = Car::latest()->paginate($perPage);
        }

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $car = new Car();
        $carModel = new CarModel();
        $carMakes = CarMake::with(['carModels'])->get();

        return view('admin.cars.create', compact('car', 'carMakes', 'carModel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Car::create($requestData);

        return redirect('admin/cars')->with('flash_message', 'Car added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $carModel = $car->carModel($car->car_model_id);
        $carMakes = CarMake::with(['carModels'])->get();

        return view('admin.cars.edit', compact('car', 'carModel', 'carMakes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $car = Car::findOrFail($id);
        $car->update($requestData);

        return redirect('admin/cars')->with('flash_message', 'Car updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Car::destroy($id);

        return redirect('admin/cars')->with('flash_message', 'Car deleted!');
    }
}
