<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class payment_method extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_method')->delete();
        DB::table('payment_method')->insert([
            ['PayID'=>1,'PayType'=>'Thanh toán khi giao hàng'],
            ['PayID'=>2,'PayType'=>'Thanh toán trực tiếp'],
        ]);
    }
}
