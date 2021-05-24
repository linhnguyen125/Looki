<section class="featured-slider theme1 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title pb-3 mb-3">Sản Phẩm Nổi Bật</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="featured-init slick-nav">
                    <!-- slider-item Start -->
                    @foreach($featured_products as $featured_product)
                        <div class="slider-item">
                            <div class="product-list mb-30">
                                <div class="card product-card no-shadow">
                                    <div class="card-body p-0">
                                        <div class="media">
                                            <div class="product-thumbnail">
                                                <a href="single-product.html">
                                                    <img
                                                        class="first-img"
                                                        src="{{$featured_product->thumbnail}}"
                                                        alt="thumbnail"/>
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <div class="product-desc">
                                                    <h3 class="title">
                                                        <a href="{{$featured_product->slug}}">
                                                            {{$featured_product->name}}</a>
                                                    </h3>
                                                    <div class="star-rating">
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star de-selected"></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <span class="product-price">
{{--                                                            <del class="del">{{ number_format($featured_product->price, 0, '', '.') }} đ</del>--}}
                                                            <span class="on-sale">{{ number_format($featured_product->price, 0, '', '.') }}</span>
                                                        </span>
                                                        <button
                                                            class="pro-btn"
                                                            data-toggle="modal"
                                                            data-target="#add-to-cart">
                                                            <i class="icon-basket"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- "product-list End -->
                        </div>
                    @endforeach
                    <!-- slider-item End -->
                </div>
            </div>
        </div>
    </div>
</section>
