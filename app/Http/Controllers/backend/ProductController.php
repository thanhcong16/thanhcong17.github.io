<?php

namespace App\Http\Controllers\backend;
use App\models\{products,size,product_size,categorys};
use App\Http\Requests\AddProductRequest;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function GetAddProduct(){
        $data['categorys']=categorys::all()->toArray();
        $data['size']=size::all()->toArray();
        return view("backend.product.addproduct",$data);
    }
    function PostAddProduct(AddProductRequest $r)
    {
        if($r->hasFile('img'))
        {
            $file=$r->img;
            $file_name=Str::slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);

        }
        else
        {
            $file_name = 'no-img.jpg';
        }
        $prd = products::create([
            'ProCode' => $r->code,
            'ProName' => $r->name,
            'ProSlug' => Str::slug($r->name),
            'ProPrice' => $r->price,
            'ProFeatured' => $r->featured,
            'ProStatus' => $r->status,
            'ProInfo' => $r->info,
            'ProImg' => $file_name,
            'CateID'=> $r->category,
        ]);

        $prd->size()->attach($r->size);
        return redirect('/admin/product')->with('thongbao','Đã thêm sản phẩm thành công.');

    }


    function GetEditProduct(){
        return view("backend.product.editproduct");
    }
    function GetListProduct(){
        $data['products']=products::paginate(4);
        $data['size']=size::all()->toArray();

        // $data['product_size']=product_size::all()->toArray();

        return view("backend.product.listproduct",$data);
    }
}
