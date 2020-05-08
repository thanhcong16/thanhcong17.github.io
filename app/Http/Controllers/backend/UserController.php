<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function GetAddUser(){
        return view("backend.user.adduser");
    }
    function GetEditUser(){
        return view("backend.user.edituser");
    }
    function GetListUser(){
        return view("backend.user.listuser");
    }
}
