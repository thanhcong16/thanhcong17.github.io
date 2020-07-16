<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CheckOutRequest;
use App\models\{orders,products,product_size};
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
    function GetCheckout(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0,"",",");
        return view('frontend.checkout.checkout',$data);
    }

    function PostCheckout(CheckOutRequest $r)
    {
        $order = new orders;
        $order->OrderCustomer = $r->fullname;
        $order->OrderAddress = $r->address;
        $order->OrderPhone = $r->phone;
        $order->OrderCustomer = $r->fullname;
        $order->OrderStatus = 0;
        $order->UserID = Auth::User()->id;
        $order->PayID = $r->paymenMethod;
        $order->save();
        foreach(Cart::content() as $row)
        {
            $prd_id=products::where('ProCode',$row->id)->first();
            $order->products()->attach($prd_id->ProID, [
                'OrdQuantity' => $row->qty,
                'OrdSize' => $row->options->size,
            ]);
        }
        session()->put('order',$order->OrderID);

        Cart::destroy();
        return redirect('checkout/complete/order');
    }

    function GetComplete($order){
        $order_id=session()->get($order);
        $data['order']=orders::find($order_id);
        $order=orders::find($order_id);
        $data['total']= DB::table('orders')
            ->join('order_product','order_product.OrderID','=','orders.OrderID')
            ->join('products','products.ProID','=','order_product.ProID')
            ->where('orders.OrderID',$order_id)
            ->select('orders.OrderID',DB::raw('sum(products.ProPrice * order_product.OrdQuantity) as total'))
            ->groupBy('orders.OrderID')->first();

        return view('frontend.checkout.complete',$data);
    }
}
