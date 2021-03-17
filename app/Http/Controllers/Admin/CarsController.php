<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Http\Requests;

use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CarsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cars = Car::latest()->paginate();
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
        $valiadtedData = $this->validateRequest($request);

        try {
            $car = Car::create($valiadtedData);

            foreach ($request->input('images', []) as $file) {
                $car->addMedia(storage_path('tmp/uploads/cars/' . $file))->toMediaCollection('car_image');
            }

            return redirect('/admin/cars/' . $car->id)->with('flash_message', 'Car added!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to create car: ' . $th->getMessage());
            return redirect('admin/cars')->with('flash_message_error', 'Error while creating car!');
        }
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
        $carImages =  $car->images();

        return view('admin.cars.show', compact('car', 'carImages'));
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
        $valiadtedData = $this->validateRequest($request);

        $car = Car::findOrFail($id);

        try {
            $car->update($valiadtedData);

            $carImages = $car->images()->pluck('file_name')->toArray();

            // add images from request to the DB
            foreach ($request->input('images', []) as $file) {
                if (count($carImages) === 0 || !in_array($file, $carImages)) {
                    $car->addMedia(storage_path('tmp/uploads/cars/' . $file))->toMediaCollection('car_image');
                }
            }

            return redirect('admin/cars/' . $car->id)->with('flash_message', 'Car updated!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to update car: ' . $th->getMessage());
            return redirect('admin/cars')->with('flash_message_error', 'Error while updating car!');
        }
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
        try {
            Car::destroy($id);
            return redirect('admin/cars')->with('flash_message', 'Car deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to delete car: ' . $th->getMessage());
            return redirect('admin/cars')->with('flash_message_error', 'Error while deleting car!');
        }
    }

    /**
     *  Validates Car Request Details
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return array
     */
    public function validateRequest(Request $request)
    {
        return $request->validate([
            'car_make_id' => 'required',
            'car_model_id' => 'required',
            'year' => 'required',
            'mileage' => 'required|numeric',
            'body_type' => 'required',
            'condition_type' => 'required',
            'transmission_type' => 'required',
            'price' => 'required|numeric',
            'duty' => 'required',
            'negotiable' => 'required',
            'fuel_type' => 'required',
            'interior_type' => 'required',
            'color_type' => 'required',
            'engine_size' => 'required|numeric',
            'description' => 'required',
        ]);
    }

    // Temporarily stores the Uploded Car Images
    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads/cars');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
