@extends('layouts.client.client')

@section('title')
    {{$category->name}}
@endsection

@section('css')
    <style>
        div.product-desc h3.title{
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 45px;
        }

        @media only screen and (max-width: 992px) {
            div.banner{
                display: none;
            }
        }
        @media only screen and (max-width: 767px) {
            div.slider-range{
                max-width: 50% !important;
            }
        }
    </style>
@endsection

@section('content')
    @include('shared.client.breadcrumb')

    <!-- product tab start -->
    <div class="product-tab bg-white pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 mb-30">
                    <div class="grid-nav-wraper bg-lighten2 mb-30">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6 mb-3 mb-md-0">
                                <nav class="shop-grid-nav">
                                    <ul
                                        class="nav nav-pills align-items-center"
                                        id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a
                                                class="nav-link active"
                                                id="pills-home-tab"
                                                data-toggle="pill"
                                                href="#pills-home"
                                                role="tab"
                                                aria-controls="pills-home"
                                                aria-selected="true">
                                                <i class="fa fa-th"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <span class="total-products text-capitalize">{{$products->count()}} sản phẩm được tìm thấy</span>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-12 col-md-6 position-relative">
                                <div class="shop-grid-button d-flex align-items-center">
                                    <span class="sort-by">Sắp xếp:</span>
                                    <select
                                        class="form-select custom-select"
                                        aria-label="Default select example">
                                        <option selected>Giá giảm dần</option>
                                        <option value="1">Giá tăng dần</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product-tab-nav end -->
                    <div class="tab-content" id="pills-tabContent">
                        <!-- first tab-pane -->
                        <div
                            class="tab-pane fade show active"
                            id="pills-home"
                            role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="row grid-view theme1">
                                @foreach($products as $product)
                                    <div class="col-sm-6 col-lg-4 mb-30">
                                        <div class="card product-card">
                                            <div class="card-body">
                                                <div class="product-thumbnail position-relative">
                                                    @if($product->sale == '1')
                                                        <span class="badge badge-success top-left">-{{$product->discount->percent}}%</span>
                                                        <span class="badge badge-danger top-right">onsale</span>
                                                    @else
                                                        <span class="badge badge-danger top-right">New</span>
                                                    @endif
                                                    <a href="{{route('client.category', $product->slug)}}">
                                                        <img
                                                            class="first-img"
                                                            src="{{$product->thumbnail}}"
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
                                                                data-target="#quick-view-{{$product->id}}">
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
                                                <div class="product-desc py-0 px-0">
                                                    <h3 class="title">
                                                        <a href="{{route('client.category', $product->slug)}}">{{$product->name}}</a>
                                                    </h3>
                                                    <div class="star-rating">
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star"></span>
                                                        <span class="ion-ios-star de-selected"></span>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        @if($product->sale == '1' && $product->discount_id != null)
                                                            <span class="product-price">
                                                                <del class="del">{{ number_format($product->price, 0, '', '.') }} đ</del>
                                                                <span class="onsale">{{ number_format(($product->price - ($product->price * $product->discount->percent) / 100), 0, '', '.') }} đ</span>
                                                            </span>
                                                        @else
                                                            <span class="product-price">{{ number_format($product->price, 0, '', '.') }} đ</span>
                                                        @endif
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
                                    <!-- product-list End -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-30 order-lg-first">
                    <aside class="left-sidebar theme1">
                        <!-- search-filter start -->
                        <div class="search-filter">
                            <div class="sidbar-widget pt-0">
                                <h4 class="title">Danh sách sản phẩm</h4>
                            </div>
                        </div>

                        <ul id="offcanvas-menu2" class="blog-ctry-menu">
                            @foreach($fashions as $name => $fashion)
                                <li>
                                    <a href="javascript:void(0)">{{$name}}</a>
                                    @foreach($fashion as $itemParents)
                                        <ul class="category-sub-menu">
                                            @foreach($itemParents as $itemParent)
                                                <li><a class="hover-color" href="{{route('client.category', $itemParent['slug'])}}">{{$itemParent['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </li>
                            @endforeach

                            @foreach($cosmetics as $name => $cosmetic)
                                <li>
                                    <a href="javascript:void(0)">{{$name}}</a>
                                    @foreach($cosmetic as $itemParents)
                                        <ul class="category-sub-menu">
                                            @foreach($itemParents as $itemParent)
                                                <li><a class="hover-color" href="{{route('client.category', $itemParent['slug'])}}">{{$itemParent['name']}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>

                        <div class="search-filter">
                            <form action="#">
                            {{--                                <div class="sidbar-widget mt-10">--}}
                            {{--                                    <h4 class="sub-title">Price</h4>--}}
                            {{--                                    <div class="price-filter mt-10">--}}
                            {{--                                        <div class="price-slider-amount">--}}
                            {{--                                            <input--}}
                            {{--                                                type="text"--}}
                            {{--                                                id="amount"--}}
                            {{--                                                name="price"--}}
                            {{--                                                readonly--}}
                            {{--                                                placeholder="Add Your Price"--}}
                            {{--                                            />--}}
                            {{--                                        </div>--}}
                            {{--                                        <div id="slider-range"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            <!-- sidbar-widget -->

                                {{--                                <div class="sidbar-widget mt-10">--}}
                                {{--                                    <h4 class="sub-title">Brand</h4>--}}
                                {{--                                    <div class="widget-check-box">--}}
                                {{--                                        <input type="checkbox" id="20824" />--}}
                                {{--                                        <label for="20824">Graphic Corner<span>(5)</span></label>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="widget-check-box">--}}
                                {{--                                        <input type="checkbox" id="20825" />--}}
                                {{--                                        <label for="20825">Studio Design<span>(8)</span></label>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </form>
                        </div>
                        <!-- search-filter end -->
                        <div class="product-widget mb-60 mt-30">
                            <h3 class="title">Product Tags</h3>
                            <ul class="product-tag d-flex flex-wrap">
                                <li><a href="#">shopping</a></li>
                                <li><a href="#">New products</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">sale</a></li>
                            </ul>
                        </div>
                        <!--second banner start-->
                        <div class="banner hover-animation position-relative overflow-hidden">
                            <a href="shop-grid-4-column.html" class="d-block">
                                <img src="{{asset('assets/client/img/testimonial-image/shoes3.jpg')}}" alt="img"/>
                            </a>
                        </div>
                        <!--second banner end-->
                    </aside>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9 offset-lg-3">
                    <nav class="pagination-section mt-30 mb-30">
{{--                        <ul class="pagination justify-content-center">--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#"><i class="ion-chevron-left"></i></a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item active">--}}
{{--                                <a class="page-link" href="#">1</a>--}}
{{--                            </li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#"><i class="ion-chevron-right"></i></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

                        {!! $products->withQueryString()->onEachSide(1)->links() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->
    @include('shared.client.category.modal')
@endsection
