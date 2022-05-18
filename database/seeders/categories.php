<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['id'=> null,'name'=>"Đồ chơi thông minh",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi vận động",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Xe đồ chơi trẻ em",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Bể bơi phao bơi",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi nấu ăn",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi búp bê",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi xếp hình lắp ráp",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi học tập",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi búp bê",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> null,'name'=>"Đồ chơi búp bê",'parent_id'=>1, "description"=>null,"active"=>1],
        ]);
    }
}
