<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Http\Requests\AccountSignupRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function GetAccount()
    {
        return view('frontend.account.signup');
    }

    function PostAccount(AccountSignupRequest $r)
    {
        $user = new User;
        $user->email = $r->email;
        $user->password = bcrypt($r->password);
        $user->fullname = $r->fullname;
        $user->address = $r->address;
        $user->phone  = $r->phone;
        $user->save();
        return redirect('/account')->with('thongbao','Đã đăng kí thành công');
    }
}
