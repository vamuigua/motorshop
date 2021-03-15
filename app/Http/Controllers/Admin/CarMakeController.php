<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Models\CarMake;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class CarMakeController extends Controller
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
        $carmake = CarMake::latest()->paginate();
        return view('admin.car-make.index', compact('carmake'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.car-make.create');
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
        $validatedData = $this->validateRequest($request);

        try {
            $car_make = CarMake::create($validatedData);
            return redirect('admin/car-make/' . $car_make->id)->with('flash_message', 'Car Make added!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to create car make: ' . $th->getMessage());
            return redirect('admin/car-make')->with('flash_message_error', 'Error while creating car make');
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
        $carmake = CarMake::findOrFail($id);
        return view('admin.car-make.show', compact('carmake'));
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
        $carmake = CarMake::findOrFail($id);

        return view('admin.car-make.edit', compact('carmake'));
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

        $carmake = CarMake::findOrFail($id);

        try {
            $car_make = $carmake->update($validatedData);
            return redirect('admin/car-make/' . $carmake->id)->with('flash_message', 'Car Make updated!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to update car make: ' . $th->getMessage());
            return redirect('admin/car-make')->with('flash_message_error', 'Error while updating car make!');
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
            CarMake::destroy($id);
            return redirect('admin/car-make')->with('flash_message', 'Car Make deleted!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to delete car make: ' . $th->getMessage());
            return redirect('admin/car-make')->with('flash_message_error', 'Error while deleting car make!');
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
            'name' => 'required|min:3|unique:App\Models\CarMake,name'
        ]);
    }

    public function addCarMake(Request $request)
    {
        $validatedData = $this->validateRequest($request);

        try {
            $car_make = CarMake::create($validatedData);
            return response()->json([
                'car_make' => $car_make->only(['id', 'name']),
                'created' => true
            ]);
        } catch (\Throwable $th) {
            Log::error('Error! Unable to create car make: ' . $th->getMessage());
        }
    }

    public function getAllCarMakes()
    {
        try {
            $carMakes = CarMake::all(['id', 'name']);
            return response()->json(['carMakes' => $carMakes]);
        } catch (\Throwable $th) {
            Log::error('Error! Unable get All car makes: ' . $th->getMessage());
            return $th->getMessage();
        }
    }
}
