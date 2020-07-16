<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\{products,categorys};

class ProductController extends Controller
{
    function GetDetail($slug_prd){
        $data['prd']=products::where('ProSlug',$slug_prd)->first();
        $data['prd_size']=products::where('ProSlug',$slug_prd)->first()->size()->get();
        $data['prd_new']=products::where('ProImg','<>','no-img')->where('ProSlug','<>',$slug_prd)->orderBy('ProID','desc')->take(4)->get();

        return view('frontend.product.detail',$data);
    }
    function GetShop(){
        $data['products']=products::where('ProImg','<>','no-img')->paginate(6);
        $data['categorys']=categorys::all();
        return view('frontend.product.shop',$data);
    }
}
