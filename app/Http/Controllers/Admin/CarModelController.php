<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\CarModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\CarMake;

class CarModelController extends Controller
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
        $carmodel = CarModel::latest()->with(['carMake'])->paginate();
        return view('admin.car-model.index', compact('carmodel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $carmodel = new CarModel();
        $car_makes = CarMake::all(['id', 'name']);
        return view('admin.car-model.create', compact('carmodel', 'car_makes'));
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
        $latest_model = new CarModel();
        $validatedData = $this->validateRequest($request);

        try {
            $car_model = CarModel::create($validatedData);
            $latest_model = $car_model;

            return redirect('admin/car-model/' . $car_model->id)->with('flash_message', 'Car Model added!');
        } catch (\Throwable $th) {
            CarModel::destroy($latest_model->id);

            Log::error('Error! Unable to create car model: ' . $th->getMessage());

            return redirect('admin/car-model')->with('flash_message_error', 'Error while creating car model');
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
        $carmodel = CarModel::findOrFail($id);

        return view('admin.car-model.show', compact('carmodel'));
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
        $carmodel = CarModel::findOrFail($id);
        $car_makes = CarMake::all(['id', 'name']);
        return view('admin.car-model.edit', compact('carmodel', 'car_makes'));
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

        $validatedData = $this->validateRequest($request);

        $carmodel = CarModel::findOrFail($id);

        try {
            $carmodel->update($validatedData);
            return redirect('admin/car-model/' . $carmodel->id)->with('flash_message', 'Car Model updated!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to update car model: ' . $th->getMessage());
            return redirect('admin/car-model')->with('flash_message_error', 'Error while updating car model');
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
            CarModel::destroy($id);
            return redirect('admin/car-model')->with('flash_message', 'Car Model deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to delete car model: ' . $th->getMessage());
            return redirect('admin/car-model')->with('flash_message_error', 'Error while deleting car model!');
        }
    }

    /**
     *  Validates Car Make Request Details
     *
     * @param \Illuminate\Http\Request $request
     * 
     * @return array
     */
    public function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|min:1',
            'car_make_id' => 'required|numeric',
        ]);
    }

    // Adds Car Model through Vue Modal
    public function addCarModel(Request $request)
    {
        $latest_model = new CarModel;
        $validatedData = $this->validateRequest($request);

        try {
            $car_model = CarModel::create($validatedData);
            $latest_model = $car_model;
            return response()->json([
                'car_model' => $car_model->only(['id', 'name']),
                'created' => true
            ]);
        } catch (\Throwable $th) {
            CarModel::destroy($latest_model);
            Log::error('Error! Unable to create car model: ' . $th->getMessage());
            return response()->json([
                'error' => "Unable to create Car model",
                'created' => false
            ]);
        }
    }

    // Returns all Car Models
    public function getAllCarModels()
    {
        try {
            $carModels = CarModel::all(['id', 'name']);
            return response()->json(['carModels' => $carModels]);
        } catch (\Throwable $th) {
            Log::error('Error! Unable get All car models: ' . $th->getMessage());
            return $th->getMessage();
        }
    }
}
