<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function GetIndex(){
        return view('frontend.index');
    }

    function GetContact(){
        return view('frontend.contact');
    }

    function GetLogout(){
        Auth::logout();
        return redirect('login');
    }
}
