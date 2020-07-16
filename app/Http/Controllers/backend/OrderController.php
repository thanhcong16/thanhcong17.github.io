<?php

namespace App\Http\Controllers\backend;

use App\models\{orders,products,order_product};


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function GetDetailOrder($id_order){
        $data['order'] = orders::find($id_order);
        $data['total']= DB::table('orders')
            ->join('order_product','order_product.OrderID','=','orders.OrderID')
            ->join('products','products.ProID','=','order_product.ProID')
            ->where('orders.OrderID',$id_order)
            ->select('orders.OrderID',DB::raw('sum(products.ProPrice * order_product.OrdQuantity) as total'))
            ->groupBy('orders.OrderID')->first();


        return view("backend.order.detailorder",$data);
    }
    function Paid($id_order)
    {
        $order=orders::find($id_order);
        $order->OrderStatus = 1;
        $order->save();
        return redirect('admin/order/processed')->with('thongbao','Xử lí đơn hàng thành công.');
    }

    function GetOrder(){
        $data['orders']=orders::where('OrderStatus',0)->orderBy('OrderID', 'desc')->paginate(4);
        return view("backend.order.order",$data);
    }
    function GetProcessed(){
        $data['orders']=orders::where('OrderStatus',1)->orderBy('OrderID', 'desc')->paginate(4);
        return view("backend.order.processed",$data);
    }
    function DelOrder($id_order)
    {
        orders::destroy($id_order);
        return redirect('admin/order')->with('thongbao','Đã xóa thành công đơn hàng chưa xử lí!');
    }
}
