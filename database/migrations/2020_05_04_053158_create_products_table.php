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
            $table->increments('ProID'); //int,auto incremment,unsigned
            $table->string('ProCode',50)->unique(); //không cho phép cột mã sản phẩm trùng
            $table->string('ProName');
            $table->string('ProSlug');
            $table->decimal('ProPrice', 20, 0)->default(0); //mặc định là 0 nếu không có giá trị
            $table->tinyInteger('ProFeatured')->unsigned(); //san pham noi bat
            $table->tinyInteger('ProStatus')->unsigned();
            $table->text('ProInfo')->nullable(); //cho phép null
            $table->string('ProImg');


            //Tạo khoá ngoại liên kết đến khoá chính của bảng category
            $table->integer('CateID')->unsigned();
            $table->foreign('CateID')->references('CateID')->on('categorys')->onDelete('cascade');

            //tạo 2 cột created_at,updated_at kiểu timestamp cho phép NULL
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
