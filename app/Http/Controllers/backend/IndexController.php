<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\{orders,products,order_product};
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    function GetIndex(){
        $month_now=Carbon::now()->format('m');
        $sumAll=0;
        $year_now=Carbon::now()->format('Y');
        for($i=1; $i <=$month_now ; $i++)
        {
            $dl['Tháng '.$i]=DB::table('orders')
            ->join('order_product','order_product.OrderID','=','orders.OrderID')
            ->join('products','products.ProID','=','order_product.ProID')
            ->select(DB::raw('sum(products.ProPrice * order_product.OrdQuantity) as total'))
            ->where('orders.OrderStatus',1)
            ->whereMonth('orders.updated_at',$i)->whereYear('orders.updated_at',$year_now)
            ->value('total');
            $sumAll=$sumAll + $dl['Tháng '.$i];
        }
        $data['number']=orders::Where('OrderStatus',0)->count();
        $data['paid']=orders::Where('OrderStatus',1)->count();
        $data['sumAll']=$sumAll;

        $data['dl']=$dl;
        return view("backend.index",$data);
    }
    function Logout(){
        Auth::logout();
        return redirect('login');
    }
}
