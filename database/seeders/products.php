<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '1.jpg', 'price' => 270000, 'price_sale' => 255000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'Chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '2.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '3.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '4.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '5.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '6.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '7.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '8.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '9.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '10.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '11.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '12.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '13.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '14.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '15.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '16.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '17.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
            ['id'=> null, "name" =>"Sản phẩm đồ chơi X", 'category_id' => 5, 'thumb' => '18.jpg', 'price' => 2000, 'price_sale' => 1000, 'amount' =>50, 'sold' => 0, 'description' =>"Mô tả sản phẩm",'product_content' =>'chi tiết sản phẩm','active'=>1, 'active_sale' => 0],
        ]);
    }
}
