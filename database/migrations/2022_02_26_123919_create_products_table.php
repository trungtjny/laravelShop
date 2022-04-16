<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->unsignedBigInteger('category_id');
            $table->foreign("category_id")->references('id')->on('categories')->onDelete('cascade');
            $table->string('thumb',255);
            $table->integer('price');
            $table->integer('price_sale')->nullable();
            $table->integer('amount');
            $table->integer('sold');
            $table->text('description')->nullable();
            $table->longtext('content')->nullable();
            $table->integer('active');
            $table->integer('active_sale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
