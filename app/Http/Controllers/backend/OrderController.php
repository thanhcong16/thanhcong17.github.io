<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function GetDetailOrder(){
        return view("backend.order.detailorder");
    }
    function GetOrder(){
        return view("backend.order.order");
    }
    function GetProcessed(){
        return view("backend.order.processed");
    }
}
