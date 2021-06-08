<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\CarMake;
use App\Models\Feature;
use App\Models\CarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
        $features = Feature::all(['id', 'name', 'type']);

        return view('admin.cars.create', compact('car', 'carMakes', 'carModel', 'features'));
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
        $latest_car = new Car();
        $valiadtedData = $this->validateRequest($request);

        try {
            $car = Car::create($valiadtedData);
            $latest_car = $car;

            $car_features = $valiadtedData['features'];

            foreach ($car_features as $car_feature) {
                $car->features()->attach($car_feature); // Add the car features through the relationship
            }

            foreach ($request->input('images', []) as $file) {
                $this->uploadImages($car, $file);
            }

            return redirect('/admin/cars/' . $car->id)->with('flash_message', 'Car added!');
        } catch (\Throwable $th) {
            Car::destroy($latest_car->id);
            Log::error('Error! Car was not Created: ' . $th->getMessage());
            return redirect('admin/cars')->with('flash_message_error', 'Car was not Created!');
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
        $features = Feature::all(['id', 'name', 'type']);

        return view('admin.cars.edit', compact('car', 'carModel', 'carMakes', 'features'));
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
            // update the car with the validated data
            $car->update($valiadtedData);

            // update the car features
            $car->features()->sync($valiadtedData['features']);

            // get all images of this car
            $carImages = $car->images();

            // delete old images of this car
            if (count($carImages) > 0) {
                foreach ($carImages as $carImage) {
                    if (!in_array($carImage->file_name, $request->input('images', []))) {
                        // Delete image from media table
                        $carImage->delete();

                        // Delete the image from Cloudinary
                        $resource = "Cars/" . $carImage->name;
                        $result = Cloudinary::destroy($resource);
                    }
                }
            }

            // get the car image file names of this car
            $carImageFileNames = $carImages->pluck('file_name')->toArray();

            // add images from the request to the DB
            foreach ($request->input('images', []) as $file) {
                if (count($carImageFileNames) === 0 || !in_array($file, $carImageFileNames)) {
                    $this->uploadImages($car, $file);
                }
            }

            return redirect('admin/cars/' . $car->id)->with('flash_message', 'Car updated!');
        } catch (\Throwable $th) {
            Log::error('Error! Unable to update car: ' . $th->getMessage());
            return redirect('admin/cars/' . $car->id)->with('flash_message_error', 'Error while updating car!');
        }
    }

    /**
     * Uploads an image file to Cloudinary and stores its model-relationship in the media table.
     *
     * @param  Car $car
     * @param File $file
     *
     * @return void
     */
    public function uploadImages(Car $car, $file)
    {
        // Upload an Image File to Cloudinary
        $uploadedFile = Cloudinary::upload(
            storage_path('tmp/uploads/cars/' . $file),
            ['folder' => 'Cars']
        );
        // Get https path to uploaded Image media
        $uploadedImageURL = $uploadedFile->getSecurePath();

        // Save the image with the Car model-relationship
        $car->addMediaFromUrl($uploadedImageURL)->toMediaCollection('car_image');
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
            'isFeatured' => 'required',
            'fuel_type' => 'required',
            'interior_type' => 'required',
            'color_type' => 'required',
            'engine_size' => 'required|numeric',
            'description' => 'required',
            'features' => 'required',
            'images.*' => 'required|string'
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
