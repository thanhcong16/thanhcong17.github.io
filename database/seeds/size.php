<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class size extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size')->delete();
        DB::table('size')->insert([
            ['SizeID'=>1,'SizeType'=>'S'],
            ['SizeID'=>2,'SizeType'=>'M'],
            ['SizeID'=>3,'SizeType'=>'L'],
            ['SizeID'=>4,'SizeType'=>'XL'],
            ['SizeID'=>5,'SizeType'=>'XXL'],

        ]);
    }
}
