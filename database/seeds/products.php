<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            ['ProID'=>1,'ProCode'=>'SP01','ProName'=>'Áo Nữ Sơ Mi Chấm Bi','ProSlug'=>'ao-nu-so-mi-cham-bi','ProPrice'=>50000,'ProFeatured'=>1,'ProStatus'=>1,'ProImg'=>'Ao_nu_so_mi_cham_bi.jpg','CateID'=>6],
            ['ProID'=>2,'ProCode'=>'SP02','ProName'=>'Áo Nữ Phối Viền','ProSlug'=>'ao-nu-phoi-vien','ProPrice'=>60000,'ProFeatured'=>1,'ProStatus'=>0,'ProImg'=>'ao-nu-phoi-vien.jpg','CateID'=>6],
            ['ProID'=>3,'ProCode'=>'SP03','ProName'=>'Áo Sơ Mi Có Cổ Đúc','ProSlug'=>'ao-so-mi-co-co-duc','ProPrice'=>70000,'ProFeatured'=>0,'ProStatus'=>1,'ProImg'=>'ao-nu-so-mi-co-co-duc.jpg','CateID'=>6],
            ['ProID'=>4,'ProCode'=>'SP04','ProName'=>'Áo sơ mi caro xám Xanh','ProSlug'=>'ao-so-mi-caro-xam-xanh','ProPrice'=>80000,'ProFeatured'=>0,'ProStatus'=>1,'ProImg'=>'ao-so-mi-ca-ro-xam-xanh-asm1228-10199.jpg','CateID'=>2],
            ['ProID'=>5,'ProCode'=>'SP05','ProName'=>'Áo Sơ Mi Hoạ Tiết Đen','ProSlug'=>'ao-so-mi-hoa-tiet-den','ProPrice'=>90000,'ProFeatured'=>0,'ProStatus'=>1,'ProImg'=>'ao-so-mi-hoa-tiet-den-asm1223-10191.jpg','CateID'=>2],
            ['ProID'=>6,'ProCode'=>'SP06','ProName'=>'Áo Sơ Mi Trắng Kem','ProSlug'=>'ao-so-mi-trang-kem','ProPrice'=>100000,'ProFeatured'=>1,'ProStatus'=>1,'ProImg'=>'ao-so-mi-trang-kem-asm836-8193.jpg','CateID'=>2],
            ['ProID'=>7,'ProCode'=>'SP07','ProName'=>'Quần kaki Đỏ Nam','ProSlug'=>'quan-kaki-do-nam','ProPrice'=>110000,'ProFeatured'=>1,'ProStatus'=>1,'ProImg'=>'quan-kaki-do-man-qk162-8273.jpg','CateID'=>3],
            ['ProID'=>8,'ProCode'=>'SP08','ProName'=>'Quần kaki Xám','ProSlug'=>'quan-kaki-xam','ProPrice'=>120000,'ProFeatured'=>1,'ProStatus'=>1,'ProImg'=>'quan-kaki-xam-chuot-dam-qk171-9770.jpg','CateID'=>3],
        ]);
    }
}
