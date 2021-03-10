<?php

namespace Database\Seeders;

use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_make = CarMake::where('id', '1')->first();
        $car_model = new CarModel();
        $car_model->name = 'Impreza WRX STI';
        $car_model->year = '2020';
        $car_model->car_make_id = $car_make->id;
        $car_model->save();

        $car_make2 = CarMake::where('id', '2')->first();
        $car_model2 = new CarModel();
        $car_model2->name = 'maybach s650';
        $car_model2->year = '2020';
        $car_model2->car_make_id = $car_make2->id;
        $car_model2->save();
    }
}
