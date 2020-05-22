<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\{AddUserRequest,EditUserRequest};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    function GetAddUser(){
        return view("backend.user.adduser");
    }
    function PostAddUser(AddUserRequest $r)
    {
        $user=new User;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->fullname=$r->fullname;
        $user->address=$r->address;
        $user->phone=$r->phone;
        $user->level=$r->level;
        $user->save();
        return redirect('admin/user')->with('thongbao','Đã Thêm Thành Công');
    }

    function GetEditUser($id_user){
        $data['user']=user::find($id_user);
        return view("backend.user.edituser",$data);
    }
    function PostEditUser(EditUserRequest $r,$id_user)
    {
        $user=User::find($id_user);
        $user->email=$r->email;
        if($r->password!="")
        {
            $this->validate($r,[
                'password'=> 'min:6',
            ]);
            $user->password=bcrypt($r->password);
        }
        $user->fullname=$r->fullname;
        $user->address=$r->address;
        $user->phone=$r->phone;
        $user->level=$r->level;
        $user->save();
        return redirect('admin/user')->with('thongbao','Đã Sửa Thành Công');
    }
    function DelUser($id_user)
    {
        User::destroy($id_user);
        return redirect()->back()->with('thongbao','Đã Xóa Thành Công');

    }

    function GetListUser(){
        $data['user']=User::OrderBy('level','desc')->paginate(4);
        return view("backend.user.listuser",$data);
    }
}
