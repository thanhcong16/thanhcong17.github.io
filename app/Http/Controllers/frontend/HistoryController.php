<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\models\{orders,products,product_size};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    function GetExchange()
    {
        $data['order']=orders::where('UserID',Auth::user()->id)->orderBy('OrderStatus','asc')->orderBy('OrderID','desc')->paginate(4);
        $data['now'] = Carbon::now();

        return view('frontend.history.exchange',$data);
    }
    function DelOrder($id_order)
    {
        orders::destroy($id_order);
        return redirect()->back()->with('thongbao','Đã xóa thành công đơn đặt hàng của bạn!');
    }

    function GetDetail($id_order)
    {
        $data['order'] = orders::find($id_order);
        $data['total']= DB::table('orders')
            ->join('order_product','order_product.OrderID','=','orders.OrderID')
            ->join('products','products.ProID','=','order_product.ProID')
            ->where('orders.OrderID',$id_order)
            ->select('orders.OrderID',DB::raw('sum(products.ProPrice * order_product.OrdQuantity) as total'))
            ->groupBy('orders.OrderID')->first();


        return view('frontend.history.detail',$data);
    }
}
