<?php

namespace Database\Seeders;

use App\Models\CarMake;
use Illuminate\Database\Seeder;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_make = new CarMake();
        $car_make->name = 'subaru';
        $car_make->save();

        $car_make2 = new CarMake();
        $car_make2->name = 'mercedes benz';
        $car_make2->save();
    }
}
