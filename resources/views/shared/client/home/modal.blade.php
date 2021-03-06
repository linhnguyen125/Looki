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
                                    <h4 class="sub-title">Danh m???c: {{$new_product->category->name}}</h4>
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
                                      <span class="new-price">{{ number_format($new_product->price, 0, '', '.') }} ??</span>
                                    </span>
                                    <div>
                                        {!! $new_product->description !!}
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <form>
                                        @csrf
                                        <div class="product-count style d-flex flex-column flex-sm-row my-4">
                                            <div class="count d-flex">
                                                <input type="hidden" class="{{$new_product->slug}}"
                                                       data-name="{{$new_product->name}}" data-url="{{route('client.cart.add')}}"
                                                       data-id="{{$new_product->id}}" data-thumbnail="{{$new_product->thumbnail}}"
                                                       data-slug="{{$new_product->slug}}"
                                                       data-price="{{$new_product->price}}" data-discount="{{$new_product->discount->percent ?? 0}}" value="1"
                                                />
                                                <input type="number" min="1" max="{{$new_product->stock}}" step="1" value="1" />
                                                <div class="button-group">
                                                    <a href="javascript:void(0)" class="count-btn increment">
                                                        <i class="fas fa-chevron-up"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="count-btn decrement">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0)" class="btn btn-dark btn--xl mt-5 mt-sm-0 add-cart" data-target_class="{{$new_product->slug}}">
                                                    <span class="mr-2"><i class="ion-android-add"></i></span>
                                                    Th??m v??o gi??? h??ng
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="addto-whish-list">
                                        <a href="#"><i class="icon-heart"></i> Y??u th??ch</a>
                                        <a href="#"><i class="icon-shuffle"></i> So s??nh</a>
                                    </div>
                                    <div class="pro-social-links mt-10">
                                        <ul class="d-flex align-items-center">
                                            <li class="share">Chia s???</li>
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
                                    <h4 class="sub-title">Danh m???c: {{$sale_product->category->name}}</h4>
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
                                      <span style="font-size: 18px !important;" class="new-price text-decoration-line-through">{{ number_format($sale_product->price, 0, '', '.') }} ??</span>
                                      <span class="new-price">{{ number_format(($sale_product->price - ($sale_product->price * $sale_product->discount->percent) / 100), 0, '', '.') }} ??</span>
                                    </span>
                                    <div>
                                        {!! $sale_product->description !!}
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <form>
                                        @csrf
                                        <div class="product-count style d-flex flex-column flex-sm-row my-4">
                                            <div class="count d-flex">
                                                <input type="hidden" class="{{$sale_product->slug}}"
                                                       data-name="{{$sale_product->name}}" data-url="{{route('client.cart.add')}}"
                                                        data-id="{{$sale_product->id}}" data-thumbnail="{{$sale_product->thumbnail}}"
                                                       data-slug="{{$sale_product->slug}}"
                                                        data-price="{{$sale_product->price}}" data-discount="{{$sale_product->discount->percent}}" value="1"
                                                />
                                                <input type="number" min="1" max="{{$sale_product->stock}}" step="1" value="1" />
                                                <div class="button-group">
                                                    <a href="javascript:void(0)" class="count-btn increment">
                                                        <i class="fas fa-chevron-up"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="count-btn decrement">
                                                        <i class="fas fa-chevron-down"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0)" class="btn btn-dark btn--xl mt-5 mt-sm-0 add-cart" data-target_class="{{$sale_product->slug}}">
                                                    <span class="mr-2"><i class="ion-android-add"></i></span>
                                                    Th??m v??o gi??? h??ng
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="addto-whish-list">
                                        <a href="#"><i class="icon-heart"></i> Y??u th??ch</a>
                                        <a href="#"><i class="icon-shuffle"></i> So s??nh</a>
                                    </div>
                                    <div class="pro-social-links mt-10">
                                        <ul class="d-flex align-items-center">
                                            <li class="share">Chia s???</li>
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

