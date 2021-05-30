<div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title">Giỏ hàng</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div id="cart">
            @if(Cart::count() > 0)
                <ul class="minicart-product-list" id="list-cart">
                    @foreach(Cart::content() as $item)
                        <li class="{{$item->rowId}}">
                            <a href="{{route('client.category', $item->options->slug)}}" class="image">
                                <img src="{{$item->options->thumbnail}}" alt="Cart product Image"/>
                            </a>
                            <div class="content">
                                <a href="{{route('client.category', $item->options->slug)}}" class="title">
                                    {{$item->name}}
                                </a>
                                <span class="quantity-price">{{$item->qty}} x <span class="amount">{{ number_format($item->price, 0, '', '.') }} đ</span></span>
                                <a href="javascript:void(0)" class="remove mt-5"><span class="trash text-soft"><i class="fas fa-trash-alt"></i> </span></a>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="sub-total d-flex flex-wrap justify-content-between">
                    <strong>Total :</strong>
                    <span class="amount" id="amount">{{Cart::total()}} đ</span>
                </div>
                <a
                    href="{{route('client.cart')}}"
                    class="btn btn-primary btn--lg d-block d-sm-inline-block mr-sm-2">GIỎ HÀNG</a>
                <a href="checkout.html" class="btn btn-dark btn--lg d-block d-sm-inline-block mt-4 mt-sm-0">THANH TOÁN</a>
                <p class="minicart-message">Miễn phí giao hàng đơn hàng từ 300k</p>
            @endif

            @if(Cart::count() == 0)
                <div class="text-center" id="empty" style="min-height: 300px">
                    <span class="mb-3">
                        <img style="width: 100px; margin-top: 100px" src="{{asset('assets/client/img/cart/null.png')}}" alt="null">
                    </span>
                    <p class="mb-3">Giỏ hàng của bạn còn trống</p>
                </div>
            @endif
        </div>
    </div>
</div>
