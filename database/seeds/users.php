<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=>bcrypt('123456'),'fullname'=>'Nguyễn Thành Công','address'=>'Hà Nội','phone'=>'098999999','level'=>2],
            ['id'=>2,'email'=>'member@gmail.com','password'=>bcrypt('123456'),'fullname'=>'Nguyễn Công Thành','address'=>'Bắc Ninh','phone'=>'0352264487','level'=>1],
            ['id'=>3,'email'=>'thanhcong@gmail.com','password'=>bcrypt('123456'),'fullname'=>'Nguyễn Công','address'=>'Hà Nam','phone'=>'0352193480','level'=>1],

        ]);
    }
}
