<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        $input['email'] = 'admin3@localhost.com';
        $input['password'] = Hash::make('123456') ;
        User::create($input); 
        DB::table('designs')->insert(['id'=>1,'banner'=> "banner.jpg","slider1" =>'slider1.png',"slider2" =>'slider2.png',"slider3" =>'slider3.png',"slogan"=>"BabyShop - Thế giới đồ chơi an toàn cho trẻ"]);
        $this->call(categories::class); 
        $this->call(products::class); 
    }
}
