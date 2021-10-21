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
        $makes = [
            "Subaru", "Mercedes-Benz", "Toyota", "Nissan", "Isuzu", "Mitsubishi", "Ford", "Honda",
            "VolksWagen", "BMW", "Ford", "Lexus", "Audi", "LandRover", "Jeep", "Man", "Suzuki", "Porsche",
            "Tata", "Yamaha", "Hyundai", "Kia", "Jaguar", "Peugeot", "Renault", "Chevloret", "Volvo"
        ];

        foreach ($makes as $make) {
            $carmake = new CarMake();
            $carmake->name = $make;
            $carmake->save();
        }
    }
}
