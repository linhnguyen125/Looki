<div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title">Giỏ hàng</span>
            <button class="offcanvas-close">×</button>
        </div>
        <ul class="minicart-product-list">
            @foreach(Cart::content() as $item)
                <li>
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
            <span class="amount">{{Cart::total()}} đ</span>
        </div>
        <a
            href="{{route('client.cart')}}"
            class="btn btn-primary btn--lg d-block d-sm-inline-block mr-sm-2">GIỎ HÀNG</a>
        <a href="checkout.html" class="btn btn-dark btn--lg d-block d-sm-inline-block mt-4 mt-sm-0">THANH TOÁN</a>
        <p class="minicart-message">Miễn phí giao hàng đơn hàng từ 300k</p>
    </div>
</div>
