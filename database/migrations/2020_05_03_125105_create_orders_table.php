<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('OrderID');
            $table->tinyInteger('OrderStatus')->unsigned();
            $table->string('OrderCustomer');
            $table->string('OrderAddress');
            $table->string('OrderPhone');

            //tạo liên kết đến khóa chính bảng user
            $table->integer('UserID')->unsigned();
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');

            //tạo liên kết đến khóa chính bảng payment_method
            $table->integer('PayID')->unsigned();
            $table->foreign('PayID')->references('PayID')->on('payment_method')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
