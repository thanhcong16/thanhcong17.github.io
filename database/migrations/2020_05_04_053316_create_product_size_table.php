<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('SizeID')->unsigned();
            $table->integer('ProID')->unsigned();
            //tạo liên kết với bảng size
            $table->foreign('SizeID')->references('SizeID')->on('size')->onDelete('cascade');
            //tạo liên kết với bảng product
            $table->foreign('ProID')->references('ProID')->on('products')->onDelete('cascade');


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
        Schema::dropIfExists('product_size');
    }
}
