<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();
        DB::table('orders')->insert(
            [
                ['OrderID'=>1,'OrderCustomer'=>'Nguyễn Văn Đạt','OrderAddress'=>'Bắc Cạn','OrderPhone'=>'03658879942','OrderStatus'=>1,'UserID'=>2,'PayID'=>1,'updated_at'=>'2020-05-12 12:16:06'],
                ['OrderID'=>2,'OrderCustomer'=>'Nguyễn Tùng Lâm','OrderAddress'=>'Bắc Ninh','OrderPhone'=>'03564478214','OrderStatus'=>1,'UserID'=>2,'PayID'=>1,'updated_at'=>'2020-05-05 12:19:28'],
                ['OrderID'=>3,'OrderCustomer'=>'Võ Văn Minh','OrderAddress'=>'Ninh Bình','OrderPhone'=>'03214789547','OrderStatus'=>0,'UserID'=>3,'PayID'=>1,'updated_at'=>'2020-05-04 12:19:41'],

            ]
        );
    }
}
