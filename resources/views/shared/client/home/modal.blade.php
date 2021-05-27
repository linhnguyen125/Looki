<!-- quick-view modal start -->
<!-- new product start -->
@foreach($new_products as $new_product)
    <div class="modal fade theme1 style1"
         id="quick-view-new-{{$new_product->id}}"
         tabindex="-1"
         role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto col-lg-5 mb-5 mb-lg-0">
                            <div class="product-sync-init mb-20">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <img
                                            src="{{$new_product->thumbnail}}"
                                            alt="product-thumb"
                                        />
                                    </div>
                                </div>

                                @foreach($new_product->images as $image)
                                    <div class="single-product">
                                        <div class="product-thumb">
                                            <img
                                                src="{{$image->path}}"
                                                alt="product-thumb"
                                            />
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="product-sync-nav">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <a href="javascript:void(0)">
                                            <img
                                                src="{{$new_product->thumbnail}}"
                                                alt="product-thumb"
                                            /></a>
                                    </div>
                                </div>
                                @foreach($new_product->images as $image)
                                    <div class="single-product">
                                        <div class="product-thumb">
                                            <a href="javascript:void(0)">
                                                <img
                                                    src="{{$image->path}}"
                                                    alt="product-thumb"
                                                /></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="modal-product-info">
                                <div class="product-head">
                                    <h2 class="title">
                                        {{$new_product->name}}
                                    </h2>
                                    <h4 class="sub-title">Danh mục: {{$new_product->category->name}}</h4>
                                    <div class="star-content mb-20">
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on de-selected"><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <span class="product-price text-center">
                                      <span class="new-price">{{ number_format($new_product->price, 0, '', '.') }} đ</span>
                                    </span>
                                    <div>
                                        {!! $new_product->description !!}
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div
                                        class="product-count style d-flex flex-column flex-sm-row my-4">
                                        <div class="count d-flex">
                                            <input type="number" min="1" max="{{$new_product->stock}}" disabled step="1" value="1"/>
                                            <div class="button-group">
                                                <button class="count-btn increment">
                                                    <i class="fas fa-chevron-up"></i>
                                                </button>
                                                <button class="count-btn decrement">
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-dark btn--xl mt-5 mt-sm-0">
                                                <span class="mr-2"><i class="ion-android-add"></i></span>
                                                Thêm vào giỏ hàng
                                            </button>
                                        </div>
                                    </div>
                                    <div class="addto-whish-list">
                                        <a href="#"><i class="icon-heart"></i> Yêu thích</a>
                                        <a href="#"><i class="icon-shuffle"></i> So sánh</a>
                                    </div>
                                    <div class="pro-social-links mt-10">
                                        <ul class="d-flex align-items-center">
                                            <li class="share">Chia sẻ</li>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-pinterest"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- new product start -->

<!-- on sale product start -->
@foreach($sale_products as $sale_product)
    <div class="modal fade theme1 style1"
         id="quick-view-sale-{{$sale_product->id}}"
         tabindex="-1"
         role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto col-lg-5 mb-5 mb-lg-0">
                            <div class="product-sync-init mb-20">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <img
                                            src="{{$sale_product->thumbnail}}"
                                            alt="product-thumb"
                                        />
                                    </div>
                                </div>

                                @foreach($sale_product->images as $image)
                                    <div class="single-product">
                                        <div class="product-thumb">
                                            <img
                                                src="{{$image->path}}"
                                                alt="product-thumb"
                                            />
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="product-sync-nav">
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <a href="javascript:void(0)">
                                            <img
                                                src="{{$sale_product->thumbnail}}"
                                                alt="product-thumb"
                                            /></a>
                                    </div>
                                </div>
                                @foreach($sale_product->images as $image)
                                    <div class="single-product">
                                        <div class="product-thumb">
                                            <a href="javascript:void(0)">
                                                <img
                                                    src="{{$image->path}}"
                                                    alt="product-thumb"
                                                /></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="modal-product-info">
                                <div class="product-head">
                                    <h2 class="title">
                                        {{$sale_product->name}}
                                    </h2>
                                    <h4 class="sub-title">Danh mục: {{$sale_product->category->name}}</h4>
                                    <div class="star-content mb-20">
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on"><i class="fas fa-star"></i> </span>
                                        <span class="star-on de-selected"><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <span class="product-price text-center">
                                      <span class="new-price">{{ number_format($sale_product->price, 0, '', '.') }} đ</span>
                                    </span>
                                    <div>
                                        {!! $sale_product->description !!}
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div
                                        class="product-count style d-flex flex-column flex-sm-row my-4">
                                        <div class="count d-flex">
                                            <input type="number" min="1" max="{{$sale_product->stock}}" disabled step="1" value="1"/>
                                            <div class="button-group">
                                                <button class="count-btn increment">
                                                    <i class="fas fa-chevron-up"></i>
                                                </button>
                                                <button class="count-btn decrement">
                                                    <i class="fas fa-chevron-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-dark btn--xl mt-5 mt-sm-0">
                                                <span class="mr-2"><i class="ion-android-add"></i></span>
                                                Thêm vào giỏ hàng
                                            </button>
                                        </div>
                                    </div>
                                    <div class="addto-whish-list">
                                        <a href="#"><i class="icon-heart"></i> Yêu thích</a>
                                        <a href="#"><i class="icon-shuffle"></i> So sánh</a>
                                    </div>
                                    <div class="pro-social-links mt-10">
                                        <ul class="d-flex align-items-center">
                                            <li class="share">Chia sẻ</li>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-pinterest"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!-- on sale product start -->
<!-- quick-view modal end -->

<!-- second modal -->
<div class="modal fade style2" id="compare" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="title">
                    <i class="fa fa-check"></i> Product added to compare.
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- third modal -->
<div class="modal fade style3" id="add-to-cart" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <h5 class="modal-title" id="add-to-cartCenterTitle">
                    Product successfully added to your shopping cart
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-5 divide-right">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('assets/client/img/product/2.png')}}" alt="img"/>
                            </div>
                            <div class="col-md-6 mb-2 mb-md-0">
                                <h4 class="product-name">
                                    New Balance Running Arishi trainers in triple
                                </h4>
                                <h5 class="price">$$29.00</h5>
                                <h6 class="color">
                                    <strong>Dimension: </strong>: <span class="dmc">40x60cm</span>
                                </h6>
                                <h6 class="quantity"><strong>Quantity:</strong>&nbsp;1</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="modal-cart-content">
                            <p class="cart-products-count">There is 1 item in your cart.</p>
                            <p><strong>Total products:</strong>&nbsp;$123.72</p>
                            <p><strong>Total shipping:</strong>&nbsp;$7.00</p>
                            <p><strong>Taxes</strong>&nbsp;$0.00</p>
                            <p><strong>Total:</strong>&nbsp;$130.72 (tax excl.)</p>
                            <div class="cart-content-btn">
                                <button
                                    type="button"
                                    class="btn btn-dark btn--md mt-4"
                                    data-dismiss="modal">
                                    Continue shopping
                                </button>
                                <button class="btn btn-dark btn--md mt-4">
                                    Proceed to checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
