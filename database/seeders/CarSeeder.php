<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $car_make_1 = CarMake::where('id', '1')->first();
        $car_model_1 = CarModel::where('id', '1')->first();

        $car_1 = new Car();
        $car_1->car_make_id = $car_make_1->id;
        $car_1->car_model_id = $car_model_1->id;
        $car_1->year = '2020';
        $car_1->mileage = '12000';
        $car_1->body_type = 'Saloon';
        $car_1->condition_type = 'Foreign-used';
        $car_1->transmission_type = 'Automatic';
        $car_1->price = '1000000';
        $car_1->duty = 'Duty-paid';
        $car_1->negotiable = '1';
        $car_1->fuel_type = 'Petrol';
        $car_1->interior_type = 'Leather';
        $car_1->color_type = 'Black';
        $car_1->engine_size = '2500';
        $car_1->description = $faker->text(50);
        $car_1->save();

        $car_make_2 = CarMake::where('id', '2')->first();
        $car_model_2 = CarModel::where('id', '2')->first();

        $car_2 = new Car();
        $car_2->car_make_id = $car_make_2->id;
        $car_2->car_model_id = $car_model_2->id;
        $car_2->year = '2020';
        $car_2->mileage = '10000';
        $car_2->body_type = 'Saloon';
        $car_2->condition_type = 'Brand-new';
        $car_2->transmission_type = 'Automatic';
        $car_2->price = '3500000';
        $car_2->duty = 'Duty-paid';
        $car_2->negotiable = '0';
        $car_2->fuel_type = 'Petrol';
        $car_2->interior_type = 'Leather';
        $car_2->color_type = 'Silver';
        $car_2->engine_size = '3000';
        $car_2->description = $faker->text(50);
        $car_2->save();
    }
}
