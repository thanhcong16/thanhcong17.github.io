<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class feedback extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->delete();
        DB::table('feedback')->insert([
            ['FeedID'=>1,'FeedTitle'=>'Đánh giá','FeedContent'=>'Sản phẩm thật chất lượng','UserId'=>2],
            ['FeedID'=>2,'FeedTitle'=>'Đánh giá','FeedContent'=>'Sản phẩm của Shop rất đẹp','UserId'=>3],

        ]);
    }
}
