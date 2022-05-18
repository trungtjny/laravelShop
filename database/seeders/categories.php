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
            ['id'=> 1,'name'=>"Đồ chơi thông minh",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> 2,'name'=>"Đồ chơi vận động",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> 3,'name'=>"Xe đồ chơi trẻ em",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> 4,'name'=>"Bể bơi phao bơi",'parent_id'=>0, "description"=>null,"active"=>1],
            ['id'=> 5,'name'=>"Đồ chơi nấu ăn",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> 6,'name'=>"Đồ chơi búp bê",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> 7,'name'=>"Đồ chơi xếp hình lắp ráp",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> 8,'name'=>"Đồ chơi học tập",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> 9,'name'=>"Đồ chơi búp bê",'parent_id'=>1, "description"=>null,"active"=>1],
            ['id'=> 10,'name'=>"Đồ chơi búp bê",'parent_id'=>1, "description"=>null,"active"=>1],
        ]);
    }
}
