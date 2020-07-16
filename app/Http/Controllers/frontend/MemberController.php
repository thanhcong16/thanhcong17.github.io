<?php

namespace App\Http\Controllers\frontend;

use App\User;

use App\Http\Requests\EditMemberRequest;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    function GetMember($info)
    {
        $id_user=session()->get($info);
        $data['user']=User::find($id_user);
        return view('frontend.member.editmember',$data);
    }
    function PostEditMember(EditMemberRequest $r,$info)
    {
        $id_user=session()->get($info);
        $user=User::find($id_user);
        $user->email=$r->email;
        $user->fullname=$r->fullname;
        $user->address=$r->address;
        $user->phone=$r->phone;
        $user->save();
        return redirect()->back()->with('thongbao','Thay đổi thông tin thành công');
    }


    function GetPassword()
    {
        return view('frontend.member.editpassword');
    }
    function PostEditPassword(EditPasswordRequest $r,$info)
    {
        $id_user=session()->get($info);
        $user = User::find($id_user);
        if(Hash::check($r->password1,$user->password) && $r->password2==$r->password3 && $r->password1!=$r->password2)
        {
            $user->password = bcrypt($r->password2);
            $user->save();
            return redirect()->back()->with('thongbao','Đổi mật khẩu thành công');

        }
        else
        {
            return redirect()->back()->with('thongbao','Đổi mật khẩu không thành công');
        }

    }
}
