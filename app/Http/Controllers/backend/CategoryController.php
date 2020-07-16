<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\models\categorys;

class CategoryController extends Controller
{

    function GetCategory(){
        $data['categorys']=categorys::all()->toArray();
        return view("backend.category.category",$data);
    }

    function PostCategory(AddCategoryRequest $r)
    {
        if(GetLevel(categorys::all()->toArray(),$r->parent,1)>2 )
        {
            return redirect()->back()->with('error','Giao diện web không hỗ trợ Danh mục lớn hơn 2 cấp.');

        }
        $cate=new categorys;
        $cate->CateName=$r->name;
        $cate->CateSlug=Str::slug($r->name);
        $cate->CateParent=$r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Đã thêm thành công danh mục');
    }

    function GetEditCategory($id_categorys){
        $data['cate']=categorys::find($id_categorys);
        $data['category']=categorys::all()->toArray();
        return view("backend.category.editcategory",$data);
    }
    function PostEditCategory(EditCategoryRequest $r,$id_categorys)
    {
        if(GetLevel(categorys::all()->toArray(),$r->parent,1)>2 )
        {
            return redirect()->back()->with('error','Giao diện web không hỗ trợ Danh mục lớn hơn 2 cấp.');

        }
        if($r->parent==$id_categorys){
            return redirect()->back()->with('error','Danh mục cha và tên danh mục trùng nhau.');

        }
        if(categorys::all()->where('CateParent',$id_categorys)->count()>0){
            return redirect()->back()->with('error','Giao diện web không hỗ trợ Danh mục lớn hơn 2 cấp.');

        };
        $cate=categorys::find($id_categorys);

        $cate->CateName=$r->name;
        $cate->CateSlug=Str::slug($r->name);
        $cate->CateParent=$r->parent;
        $cate->save();
        return redirect()->back()->with('thongbao','Sửa danh mục thành công');

    }

    function DelCategory($id_categorys)
    {
        $cate=categorys::find($id_categorys);

        categorys::where('CateParent',$id_categorys)->update(['CateParent'=>$cate->CateParent]);
        categorys::find($id_categorys)->delete();
        return redirect()->back()->with('thongbao','Đã xóa danh mục thành công');

    }
}
