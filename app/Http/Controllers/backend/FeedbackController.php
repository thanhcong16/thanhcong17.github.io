<?php

namespace App\Http\Controllers\backend;

use App\models\feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    function GetFeedback()
    {
        $data['fb']=feedback::orderBy('FeedID','desc')->paginate(4);
        return view("backend.feedback.feedback",$data);
    }
    function ShowHide($id_feedback)
    {
        $fb=feedback::find($id_feedback);
        if($fb->FeedStatus==0)
        {
            $fb->FeedStatus=1;
            $fb->save();

            return redirect()->back()->with('thongbao','Phản hồi đã được hiển thị trên website.');

        }
        else
        {
            $fb->FeedStatus=0;
            $fb->save();
            return redirect()->back()->with('thongbao','Phản hồi đã được ẩn trên website.');
        }
    }

    function Del($id_feedback)
    {
        feedback::destroy($id_feedback);
        return redirect()->back()->with('thongbao','Đã Xóa Thành Công');
    }
}
