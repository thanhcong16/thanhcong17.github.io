<?php

namespace App\Http\Controllers\backend;
use App\models\{products,size,product_size,categorys};
use App\Http\Requests\{AddProductRequest,EditProductRequest};

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


    function GetEditProduct($id_product){
        $data['product']=products::find($id_product);
        $data['size']=size::all()->toArray();
        $data['categorys']=categorys::all()->toArray();
        return view("backend.product.editproduct",$data);
    }

    function PostEditProduct(EditProductRequest $r,$id_product)
    {
        $prd = products::find($id_product);
        if($r->hasFile('img'))
        {
            if($prd->ProImg != 'no-img.jpg')
            {
                unlink('backend/img/'.$prd->ProImg);
            }
            $file=$r->img;
            $file_name=Str::slug($r->name).'.'.$file->getClientOriginalExtension();
            $file->move('backend/img',$file_name);
            $prd->fill([
                'ProImg'=> $file_name,
            ]);
        }
        $prd->fill([
            'ProCode' => $r->code,
            'ProName' => $r->name,
            'ProSlug' => Str::slug($r->name),
            'ProPrice' => $r->price,
            'ProFeatured' => $r->featured,
            'ProStatus' => $r->status,
            'ProInfo' => $r->info,

            'CateID'=> $r->category,
        ])->save();

        $prd->size()->sync($r->size);
        return redirect('/admin/product')->with('thongbao','Đã sửa sản phẩm thành công.');

    }
    function DelProduct($id_product)
    {
        products::find($id_product)->delete();
        return redirect('admin/product')->with('thongbao',"Đã xóa sản phẩm thành công");
    }

    function GetListProduct(){
        $data['products']=products::paginate(4);
        $data['size']=size::all()->toArray();

        // $data['product_size']=product_size::all()->toArray();

        return view("backend.product.listproduct",$data);
    }
}
