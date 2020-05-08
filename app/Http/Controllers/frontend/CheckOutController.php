<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    function GetCheckout(){
        return view('frontend.checkout.checkout');
    }
    function GetComplete(){
        return view('frontend.checkout.complete');
    }
}
