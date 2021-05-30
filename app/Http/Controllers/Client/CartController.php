<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('client.cart.index');
        return Cart::content();
    }

    public function add(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $qty = $request->qty;
        $price = $request->price;
        $thumbnail = $request->thumbnail;
        $discount = $request->discount;
        Cart::add([
            'id' => $id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'thumbnail' => $thumbnail,
                'discount' => $discount
            ]
        ]);

        return "Thêm vào giỏ hàng thành công";
    }
}
