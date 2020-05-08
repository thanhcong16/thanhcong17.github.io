<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function GetDetail(){
        return view('frontend.product.detail');
    }
    function GetShop(){
        return view('frontend.product.shop');
    }
}
