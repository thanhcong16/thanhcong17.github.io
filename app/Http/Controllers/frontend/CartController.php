<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\products;
use Cart;

class CartController extends Controller
{
    function GetCart(){
        $data['cart'] = Cart::content();
        $data['total'] = Cart::total(0, "", ",");

        return view('frontend.cart.cart',$data);
    }

    function AddCart(Request $r)
    {
        if($r->size=="")
        {
            $messages = [
                'size.required'=>'Bạn chưa chọn kích cỡ!'
            ];
            $this->validate($r,[
                'size'=> 'required',
            ], $messages);

        }
        $prd = products::find($r->id_product);
        Cart::add([
            'id' => $prd->ProCode,
            'name' => $prd->ProName,
            'qty' => $r->quantity,
            'price' => $prd->ProPrice,
            'weight' => 0,
            'options' => ['img' => $prd->ProImg, 'size' => $r->size]]);
        return redirect('cart');
    }

    function UpdateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
        return "success";
    }

    function DelCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }
}
