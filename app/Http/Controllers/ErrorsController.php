<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorsController extends Controller
{
    function GetErrors()
    {
        return view('errors.errors');
    }
}
