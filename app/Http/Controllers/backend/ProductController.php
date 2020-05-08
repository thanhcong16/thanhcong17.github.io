<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function GetAddProduct(){
        return view("backend.product.addproduct");
    }
    function GetEditProduct(){
        return view("backend.product.editproduct");
    }
    function GetListProduct(){
        return view("backend.product.listproduct");
    }
}
