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
        //DB::table('layouts')->insert(['banner'=> "banner.jpg","slider1" =>'slider1.png',"slider2" =>'slider2.png',"slider3" =>'slider3.png',"slogan"=>"BabyShop - Thế giới đồ chơi an toàn cho trẻ"]);
        $input['name'] = 'Nhân viên giao hàng';
        $input['role'] = 1;
        $input['email'] = 'sp@localhost.com';
        $input['password'] = Hash::make('123456') ;
        User::create($input); 
        $this->call(categories::class); 
        $this->call(products::class); 
    }
}
