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
        $price = $request->price;
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
        $data = [
            'cart_count' => Cart::content()->count(),
            'total' => Cart::total(),
            'message' => 'Thêm vào giỏ hàng thành công',
            'html' => $this->updateListCart()
        ];
        return $data;
    }

    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $cart = Cart::update($rowId, $request->qty);
        $data = [
            'total' => Cart::total(),
            'subtotal' => number_format($cart->subtotal, 0, '', '.'),
        ];
        return $data;
    }

    public function delete(Request $request)
    {
        $rowId = $request->rowId;
        Cart::remove($rowId);
        if (Cart::content()->count() == 0) {
            $html = $this->emptyCart();
        } else {
            $html = $this->updateListCart();
        }

        $data = [
            'total' => Cart::total(),
            'message' => "Đã xóa sản phẩm khỏi giỏ hàng",
            'cart_count' => Cart::content()->count(),
            'html' => $html
        ];
        return $data;
    }

    protected function updateListCart()
    {
        $carts = Cart::content();
        $html = '<ul class="minicart-product-list" id="list-cart">';
        foreach ($carts as $item) {
            $html .= '
                <li class="' . $item->rowId . '">
                    <a href="' . route('client.category', $item->options->slug) . '" class="image">
                        <img src="' . $item->options->thumbnail . '" alt="Cart product Image"/>
                    </a>
                    <div class="content">
                        <a href="' . route('client.category', $item->options->slug) . '" class="title">
                            ' . $item->name . '
                        </a>
                        <span class="quantity-price">' . $item->qty . ' x <span class="amount">' . number_format($item->price - ($item->options->discount * $item->price)/100,
                    0, "", ".") . ' đ</span></span>
                    </div>
                </li>
            ';
        }
            $html .= '
                </ul>

                <div class="sub-total d-flex flex-wrap justify-content-between">
                    <strong>Total :</strong>
                    <span class="amount" id="amount">'.Cart::total().' đ</span>
                </div>
                <a
                    href="'.route('client.cart').'"
                    class="btn btn-primary btn--lg d-block d-sm-inline-block mr-sm-2">GIỎ HÀNG</a>
                <a href="'. route('client.checkout') .'" class="btn btn-dark btn--lg d-block d-sm-inline-block mt-4 mt-sm-0">THANH TOÁN</a>
                <p class="minicart-message">Miễn phí giao hàng đơn hàng từ 300k</p>
            ';
        return $html;
    }

    protected function emptyCart()
    {
        $empty = '
            <div class="text-center" id="empty" style="min-height: 300px">
                <span class="mb-3">
                    <img style="width: 100px; margin-top: 100px" src="' . asset('assets/client/img/cart/null.png') . '" alt="null">
                </span>
                <p class="mb-3">Giỏ hàng của bạn còn trống</p>
            </div>
        ';
        return $empty;
    }
}

