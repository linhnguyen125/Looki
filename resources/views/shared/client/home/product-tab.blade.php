<section class="product-tab bg-white pt-80 pb-80">
    <div class="container">
        <div class="product-tab-nav mb-50">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Tất Cả Sản Phẩm</h2>
                        <p class="text">
                            Tất cả sản phẩm của Looki - SiuCapVipPro
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <nav class="product-tab-menu theme1">
                        <ul
                            class="nav nav-pills justify-content-center"
                            id="pills-tab"
                            role="tablist">
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    id="new-product"
                                    data-toggle="pill"
                                    href="#pills-home"
                                    role="tab"
                                    aria-controls="pills-home"
                                    aria-selected="true">Sản Phẩm Mới</a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    id="on-sale"
                                    data-toggle="pill"
                                    href="#pills-profile"
                                    role="tab"
                                    aria-controls="pills-profile"
                                    aria-selected="false">Đang Khuyến Mãi</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a--}}
{{--                                    class="nav-link"--}}
{{--                                    id="coming-soon"--}}
{{--                                    data-toggle="pill"--}}
{{--                                    href="#pills-contact"--}}
{{--                                    role="tab"--}}
{{--                                    aria-controls="pills-contact"--}}
{{--                                    aria-selected="false">Sắp ra mắt</a>--}}
{{--                            </li>--}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- product-tab-nav end -->
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="pills-tabContent">
                    <!-- New product -->
                    <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="new-product">
                        <div class="product-slider-init theme1 slick-nav">
                            <!-- slider-item start -->
                            @foreach($new_products as $new_product)
                                <div class="slider-item">
                                    <div class="card product-card">
                                        <div class="card-body p-0">
                                            <div class="media flex-column">
                                                <div class="product-thumbnail position-relative">
                                                    <span class="badge badge-danger top-right">New</span>
                                                    <a href="{{route('client.category', $new_product->slug)}}">
                                                        <img
                                                            class="first-img"
                                                            src="{{$new_product->thumbnail}}"
                                                            alt="thumbnail"/>
                                                    </a>

                                                    <!-- product links -->
                                                    <ul class="actions d-flex justify-content-center">
                                                        <li>
                                                            <a class="action" href="wishlist.html">
                                                              <span
                                                                  data-toggle="tooltip"
                                                                  data-placement="bottom"
                                                                  title="yêu thích"
                                                                  class="icon-heart">
                                                              </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="action"
                                                               href="#"
                                                               data-toggle="modal"
                                                               data-target="#compare">
                                                          <span
                                                              data-toggle="tooltip"
                                                              data-placement="bottom"
                                                              title="So sánh"
                                                              class="icon-shuffle"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="action"
                                                                href="#"
                                                                data-toggle="modal"
                                                                data-target="#quick-view-new-{{$new_product->id}}">
                                                          <span
                                                              data-toggle="tooltip"
                                                              data-placement="bottom"
                                                              title="Xem trước"
                                                              class="icon-magnifier"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- product links end-->
                                                </div>
                                                <div class="media-body">
                                                    <div class="product-desc">
                                                        <h3 class="title">
                                                            <a href="{{route('client.category', $new_product->slug)}}">{{$new_product->name}}</a>
                                                        </h3>
                                                        <div class="star-rating">
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star de-selected"></span>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span class="product-price">{{ number_format($new_product->price, 0, '', '.') }} đ</span>
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
                            @endforeach
                            <!-- slider-item end -->
                        </div>
                    </div>

                    <!-- On sale product -->
                    <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="on-sale">
                        <div class="product-slider-init theme1 slick-nav">
                            <!-- slider-item start -->
                            @foreach($sale_products as $sale_product)
                                <div class="slider-item">
                                    <div class="card product-card">
                                        <div class="card-body p-0">
                                            <div class="media flex-column">
                                                <div class="product-thumbnail position-relative">
                                                    <span class="badge badge-success top-left">-{{$sale_product->discount->percent}}%</span>
                                                    <span class="badge badge-danger top-right">onsale</span>
                                                    <a href="{{route('client.category', $sale_product->slug)}}">
                                                        <img
                                                            class="first-img"
                                                            src="{{$sale_product->thumbnail}}"
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
                                                            <a
                                                                class="action"
                                                                href="#"
                                                                data-toggle="modal"
                                                                data-target="#compare">
                                                          <span
                                                              data-toggle="tooltip"
                                                              data-placement="bottom"
                                                              title="Add to compare"
                                                              class="icon-shuffle"></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a
                                                                class="action"
                                                                href="#"
                                                                data-toggle="modal"
                                                                data-target="#quick-view-sale-{{$sale_product->id}}">
                                                                <span
                                                                  data-toggle="tooltip"
                                                                  data-placement="bottom"
                                                                  title="Quick view"
                                                                  class="icon-magnifier"></span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <!-- product links end-->
                                                </div>
                                                <div class="media-body">
                                                    <div class="product-desc">
                                                        <h3 class="title">
                                                            <a href="{{route('client.category', $sale_product->slug)}}">{{$sale_product->name}}</a>
                                                        </h3>
                                                        <div class="star-rating">
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star"></span>
                                                            <span class="ion-ios-star de-selected"></span>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center justify-content-between">
                                                            <span class="product-price mr-20">
                                                                <del class="del">{{ number_format($sale_product->price, 0, '', '.') }} đ</del>
                                                                <span class="onsale">{{ number_format(($sale_product->price - ($sale_product->price * $sale_product->discount->percent) / 100), 0, '', '.') }} đ</span>
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
                            @endforeach
                            <!-- slider-item end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
