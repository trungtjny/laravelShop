<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $input['name'] = 'Admin';
        $input['role'] = 1;
        $input['email'] = 'admin2@localhost.com';
        $input['password'] = Hash::make('123456') ;
        User::create($input);
    }
}
