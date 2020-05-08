<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    function GetIndex(){
        return view("backend.index");
    }
    function Logout(){
        Auth::logout();
        return redirect('login');
    }
}
