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
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CarMakeSeeder::class);
        $this->call(CarModelSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(CarFeatureSeeder::class);
    }
}
