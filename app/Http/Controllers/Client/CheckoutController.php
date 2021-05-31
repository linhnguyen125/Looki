<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\CheckoutRequest;
use App\Jobs\SendCheckoutMail;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    protected $orderRepo, $orderDetail;

    public function __construct(OrderRepositoryInterface $orderRepo, OrderDetailRepositoryInterface $orderDetail)
    {
        $this->orderRepo = $orderRepo;
        $this->orderDetail = $orderDetail;
    }

    public function index()
    {
        $user = Auth::user();
        $provenceId = Province::where('name', 'like', $user->address['province'] ?? '1')->first();
        $districtId = District::where('name', 'like', $user->address['district'] ?? '1')->first();
        $provinces = Province::all();
        $districts = District::where('province_id', $provenceId->id ?? '1')->get();
        $wards = Ward::where('district_id', $districtId->id ?? '1')->get();
        return view('client.checkout.index', compact('user', 'provinces', 'districts', 'wards'));
    }

    public function order(CheckoutRequest $request)
    {
        $data = $request->all();
        $province = Province::find($request->province)->name;
        $district = District::find($request->district)->name;
        $ward = Ward::find($request->ward)->name;
        $data['order_code'] = 'LKI-' . Str::upper(Str::random(8));
        $data['user_id'] = Auth::user()->id;
        $carts = Cart::content();
        $data['total'] = 0;
        foreach ($carts as $cart) {
            $data['total'] += $cart->subtotal;
        }
        $data['address'] = [
            'phone' => $request->phone,
            'province' => $province,
            'district' => $district,
            'ward' => $ward,
            'more' => $request->more,
            'note' => $request->note
        ];
        $data = Arr::except($data, ['phone', 'province', 'district', 'ward', 'more']);
        $order = $this->orderRepo->create($data);
        foreach ($carts as $cart) {
            $detail = [
                'order_id' => $order->id,
                'product_id' => $cart->id,
                'qty' => $cart->qty,
                'discount' => $cart->options->discount,
            ];
            $this->orderDetail->create($detail);
        }
        $data['order'] = $order;
        $user = Auth::user();
        if ($order) {
            $emailJob = new SendCheckoutMail($user->email, $data);
            dispatch($emailJob);
            Cart::destroy();
            $response = [
                'message' => "Bạn vui lòng kiểm tra email để xác thực thông tin đặt hàng",
                'html'  => $this->message()
            ];
            return $response;
        } else {
            $response = [
                'message' => "Có lỗi xảy ra, xin vui lòng thử lại sau",
            ];
            return $response;
        }
    }

    protected function message()
    {
        $html = '
            <div class="text-center mt-5" style="min-height: 300px">
                <span class="mb-3">
                    <img style="width: 200px" src="'.asset('assets/client/img/cart/null.png').'" alt="null">
                </span>
                <p class="mb-3">Giỏ hàng của bạn còn trống</p>
                <a href="'.url('/').'" class="btn btn--md btn-dark px-5">MUA NGAY</a>
            </div>
        ';
        return $html;
    }
}
