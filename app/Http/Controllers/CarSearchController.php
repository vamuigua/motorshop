<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use Illuminate\Support\Facades\Log;

class CarSearchController extends Controller
{
    // Return all Car Makes
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

    // Return all models of the car-make 
    public function getCarMakeModels(CarMake $carMake)
    {
        try {
            if (isset($carMake)) {
                return response()->json(['carModels' => $carMake->carModels]);
            }
        } catch (\Throwable $th) {
            Log::error('Error! Unable get Car-Make Models: ' . $th->getMessage());
            return $th->getMessage();
        }
    }
}
