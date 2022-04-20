<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user = Role::where('name', 'User')->first();

        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'doe@gmail.com';
        $user->password = Hash::make('1234567890');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Jane Doe';
        $user->email = 'jane@gmail.com';
        $user->password = Hash::make('1234567890');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
