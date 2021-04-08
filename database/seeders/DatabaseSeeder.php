<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserTableSeeder::class);
        $this->call(CarMakeSeeder::class);
        $this->call(CarModelSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(CarFeatureSeeder::class);
    }
}
