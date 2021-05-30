<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module' => 'cart']);
            return $next($request);
        });
    }

    public function index()
    {
        return view('client.cart.index');
    }

    public function add(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $qty = $request->qty;
        $discount = $request->discount;
        $price = $request->price - ($request->price * $discount) / 100;
        $thumbnail = $request->thumbnail;
        $slug = $request->slug;
        Cart::add([
            'id' => $id,
            'name' => $name,
            'qty' => $qty,
            'price' => $price,
            'weight' => 0,
            'options' => [
                'thumbnail' => $thumbnail,
                'slug' => $slug,
                'discount' => $discount
            ]
        ]);
        return "Thêm vào giỏ hàng thành công";
    }

    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $cart = Cart::update($rowId, $request->qty);
        $data = [
            'total' => Cart::total(),
            'subtotal' => number_format($cart->subtotal, 0, '', '.')
        ];
        return $data;
    }

    public function delete(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);
        $data = [
            'total' => Cart::total(),
            'message' => "Đã xóa sản phẩm khỏi giỏ hàng"
        ];
        return $data;
    }
}

