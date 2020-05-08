<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorys extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->delete();
        DB::table('categorys')->insert([
            ['CateID'=>1,'CateName'=>'Nam','CateSlug'=>'nam','CateParent'=>0],
            ['CateID'=>2,'CateName'=>'Áo Nam','CateSlug'=>'ao-nam','CateParent'=>1],
            ['CateID'=>3,'CateName'=>'Quần Nam','CateSlug'=>'quan-nam','CateParent'=>1],
            ['CateID'=>5,'CateName'=>'Nữ','CateSlug'=>'nu','CateParent'=>0],
            ['CateID'=>6,'CateName'=>'Áo Nữ','CateSlug'=>'ao-nu','CateParent'=>5],
            ['CateID'=>7,'CateName'=>'Quần Nữ','CateSlug'=>'quan-nu','CateParent'=>5]
        ]);
    }
}
