<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Feature;
use Illuminate\Database\Seeder;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = Car::all();
        $features = Feature::all();

        foreach ($cars as $car) {
            $feature = $features->random(5)->pluck('id');
            $car->features()->attach($feature);
        }
    }
}
