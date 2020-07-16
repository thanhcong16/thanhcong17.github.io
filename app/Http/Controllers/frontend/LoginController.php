<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function GetLogin()
    {
        return view('frontend.login.login');
    }
    function PostLogin(LoginRequest $r)
    {
        $email=$r->email;
        $password=$r->password;

        if(Auth::attempt(['email' => $email, 'password' => $password, 'level'=>1])){
            session()->put('info-edit',Auth::User()->id);

            return redirect('/');
        }
        if(Auth::attempt(['email' => $email, 'password' => $password, 'level'=>2])){
            session()->put('info-edit',Auth::User()->id);


            return redirect('admin');
        }
        return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng')->withInput();
    }
}
