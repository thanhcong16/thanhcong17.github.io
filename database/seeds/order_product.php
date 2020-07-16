<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order_product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->delete();
        DB::table('order_product')->insert([
            ['OrderID'=>1,'ProID'=>1,'OrdQuantity'=>1,'OrdSize'=>'M'],
            ['OrderID'=>1,'ProID'=>2,'OrdQuantity'=>1,'OrdSize'=>'L'],
            ['OrderID'=>2,'ProID'=>3,'OrdQuantity'=>1,'OrdSize'=>'S'],
            ['OrderID'=>3,'ProID'=>2,'OrdQuantity'=>2,'OrdSize'=>'M'],
            ['OrderID'=>3,'ProID'=>3,'OrdQuantity'=>1,'OrdSize'=>'L'],

        ]);
    }
}
