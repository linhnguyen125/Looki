<section class="theme1 bg-white pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title pb-3 mb-3">Có thể bạn cũng thích</h2>
                    <p class="text mt-10">Sản phẩm cùng danh mục có thể bạn sẽ quan tâm</p>
                </div>
            </div>
            <div class="col-12">
                <div class="product-slider-init theme1 slick-nav">
                    @foreach($same_products as $same_product)
                    <div class="slider-item">
                        <div class="card product-card">
                            <div class="card-body p-0">
                                <div class="media flex-column">
                                    <div class="product-thumbnail position-relative">
                                        @if($same_product->sale == '1')
                                            <span class="badge badge-success top-left">-10%</span>
                                            <span class="badge badge-danger top-right">onsale</span>
                                        @else
                                            <span class="badge badge-danger top-right">New</span>
                                        @endif
                                        <a href="{{route('client.category', $same_product->slug)}}">
                                            <img
                                                class="first-img"
                                                src="{{$same_product->thumbnail}}"
                                                alt="thumbnail"/>
                                        </a>
                                        <!-- product links -->
                                        <ul class="actions d-flex justify-content-center">
                                            <li>
                                                <a class="action" href="wishlist.html">
                                                    <span
                                                         data-toggle="tooltip"
                                                         data-placement="bottom"
                                                         title="add to wishlist"
                                                         class="icon-heart">
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="action" href="#" data-toggle="modal" data-target="#compare">
                                                    <span
                                                        data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        title="Add to compare"
                                                        class="icon-shuffle">
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="action" href="#" data-toggle="modal" data-target="#quick-view-{{$same_product->id}}">
                                                    <span
                                                        data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        title="Quick view"
                                                        class="icon-magnifier">
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- product links end-->
                                    </div>
                                    <div class="media-body">
                                        <div class="product-desc">
                                            <h3 class="title">
                                                <a href="shop-grid-4-column.html">{{$same_product->name}}</a>
                                            </h3>
                                            <div class="star-rating">
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star"></span>
                                                <span class="ion-ios-star de-selected"></span>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                @if($same_product->sale == '1')
                                                    <span class="product-price">
                                                        <del class="del">{{ number_format($same_product->price, 0, '', '.') }} đ</del>
                                                        <span class="onsale">{{ number_format(($same_product->price * 0.9), 0, '', '.') }} đ</span>
                                                    </span>
                                                @else
                                                    <span class="product-price">{{ number_format($same_product->price, 0, '', '.') }} đ</span>
                                                @endif
                                                <button class="pro-btn" data-toggle="modal" data-target="#add-to-cart-{{$same_product->id}}">
                                                    <i class="icon-basket"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- slider-item end -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('shared.client.product.modal')
</section>
