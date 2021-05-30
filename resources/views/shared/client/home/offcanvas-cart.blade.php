<div id="offcanvas-cart" class="offcanvas offcanvas-cart theme1">
    <div class="inner">
        <div class="head d-flex flex-wrap justify-content-between">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <ul class="minicart-product-list">
            <li>
                <a href="single-product.html" class="image"
                ><img src="{{asset('assets/client/img/mini-cart/1.png')}}" alt="Cart product Image"
                    /></a>
                <div class="content">
                    <a href="single-product.html" class="title"
                    >orginal Age Defying Cosmetics Makeup</a
                    >
                    <span class="quantity-price"
                    >1 x <span class="amount">$100.00</span></span
                    >
                    <a href="#" class="remove">×</a>
                </div>
            </li>
            <li>
                <a href="single-product.html" class="image"
                ><img src="{{asset('assets/client/img/mini-cart/2.png')}}" alt="Cart product Image"
                    /></a>
                <div class="content">
                    <a href="single-product.html" class="title"
                    >On Trend Makeup and Beauty Cosmetics</a
                    >
                    <span class="quantity-price"
                    >1 x <span class="amount">$35.00</span></span
                    >
                    <a href="#" class="remove">×</a>
                </div>
            </li>
            <li>
                <a href="single-product.html" class="image"
                ><img src="{{asset('assets/client/img/mini-cart/3.png')}}" alt="Cart product Image"
                    /></a>
                <div class="content">
                    <a href="single-product.html" class="title"
                    >orginal Age Defying Cosmetics Makeup</a
                    >
                    <span class="quantity-price"
                    >1 x <span class="amount">$9.00</span></span
                    >
                    <a href="#" class="remove">×</a>
                </div>
            </li>
        </ul>
        <div class="sub-total d-flex flex-wrap justify-content-between">
            <strong>Subtotal :</strong>
            <span class="amount">$144.00</span>
        </div>
        <a
            href="{{route('client.cart')}}"
            class="btn btn-primary btn--lg d-block d-sm-inline-block mr-sm-2"
        >view cart</a
        >
        <a
            href="checkout.html"
            class="btn btn-dark btn--lg d-block d-sm-inline-block mt-4 mt-sm-0"
        >checkout</a
        >
        <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
    </div>
</div>
