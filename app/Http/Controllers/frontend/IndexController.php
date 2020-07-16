<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\{products,categorys,feedback};
use App\Http\Requests\ContactRequest;
use App\User;
class IndexController extends Controller
{
    function GetIndex(){
        $data['prd_ft']=products::where('ProFeatured',1)->where('ProImg','<>','no-img')->orderBy('ProID','desc')->take(4)->get();
        $data['prd_new']=products::where('ProImg','<>','no-img')->orderBy('ProID','desc')->take(8)->get();
        $data['feedback']=feedback::where('FeedStatus',1)->orderBy('FeedID', 'desc')->paginate(2);
        return view('frontend.index',$data);
    }

    function GetContact(){
        $data['member']=User::find(Auth::user()->id);
        return view('frontend.contact',$data);
    }
    function PostContact(ContactRequest $r){
        $fb = new feedback;
        $fb->FeedTitle = $r->subject;
        $fb->FeedContent = $r->message;
        $fb->UserId = Auth::user()->id;
        $fb->save();
        return redirect()->back()->with('thongbao','Gửi liên hệ thành công.');

    }

    function GetPrdCate($slug_cate)
    {
        $data['products']=categorys::where('CateSlug',$slug_cate)->first()->prd()->paginate(6);
        $data['categorys']=categorys::all();
        return view('frontend.product.shop',$data);
    }

    function GetFillter(Request $r)
    {
        $data['products']=products::whereBetween('ProPrice',[$r->start, $r->end])->paginate(6);
        $data['categorys']=categorys::all();
        return view('frontend.product.shop',$data);

    }

    function GetLogout(){
        Auth::logout();
        session()->forget('info-edit');
        return redirect('login');
    }
}
