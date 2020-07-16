<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('OrderID')->unsigned();
            $table->integer('ProID')->unsigned();
            //tạo liên kết đến bảng orders
            $table->foreign('OrderID')->references('OrderID')->on('orders')->onDelete('cascade');
            //tạo liên kết đến bảng products
            $table->foreign('ProID')->references('ProID')->on('products')->onDelete('cascade');
            $table->integer('OrdQuantity')->unsigned();
            $table->string('OrdSize');

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
        Schema::dropIfExists('order_product');
    }
}
