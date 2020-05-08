<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_size extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_size')->delete();
        DB::table('product_size')->insert([
            ['SizeID'=>1,'ProID'=>1],
            ['SizeID'=>2,'ProID'=>1],
            ['SizeID'=>3,'ProID'=>1],
            ['SizeID'=>4,'ProID'=>1],
            ['SizeID'=>1,'ProID'=>2],
            ['SizeID'=>2,'ProID'=>2],
            ['SizeID'=>3,'ProID'=>2],
            ['SizeID'=>4,'ProID'=>2],
            ['SizeID'=>1,'ProID'=>3],
            ['SizeID'=>2,'ProID'=>3],
            ['SizeID'=>3,'ProID'=>3],
            ['SizeID'=>4,'ProID'=>3],
            ['SizeID'=>1,'ProID'=>4],
            ['SizeID'=>2,'ProID'=>4],
            ['SizeID'=>3,'ProID'=>4],

            ['SizeID'=>1,'ProID'=>5],
            ['SizeID'=>2,'ProID'=>5],
            ['SizeID'=>3,'ProID'=>5],
            ['SizeID'=>4,'ProID'=>5],
            ['SizeID'=>1,'ProID'=>6],
            ['SizeID'=>2,'ProID'=>6],
            ['SizeID'=>3,'ProID'=>6],
            ['SizeID'=>1,'ProID'=>7],
            ['SizeID'=>2,'ProID'=>7],
            ['SizeID'=>3,'ProID'=>7],
            ['SizeID'=>4,'ProID'=>7],

            ['SizeID'=>1,'ProID'=>8],
            ['SizeID'=>2,'ProID'=>8],
            ['SizeID'=>4,'ProID'=>8],
        ]);
    }
}
