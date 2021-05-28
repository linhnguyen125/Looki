@extends('layouts.client.client')

@section('css')
    <style>
        div.product-desc h3.title{
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 45px;
        }
    </style>
@endsection

@section('title')
    {{$product->name}}
@endsection

@section('content')
    @include('shared.client.breadcrumb')
    <!-- product-single start -->
    <section class="product-single theme1 pt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 p-sm-20 mb-5 mb-lg-0">
                    <div>
                        <div class="position-relative">
                            @if($product->sale == '1')
                                <span class="badge badge-success top-left">-10%</span>
                                <span class="badge badge-danger top-right">onsale</span>
                            @else
                                <span class="badge badge-danger top-right">New</span>
                            @endif
                        </div>
                        <div class="product-sync-init mb-20">
                            <div class="single-product">
                                <div class="product-thumb">
                                    <img src="{{$product->thumbnail}}" alt="product-thumb"/>
                                </div>
                            </div>
                            <!-- single-product end -->
                            @foreach($product->images as $image)
                                <div class="single-product">
                                    <div class="product-thumb">
                                        <img src="{{$image->path}}" alt="product-thumb"/>
                                    </div>
                                </div>
                                <!-- single-product end -->
                            @endforeach
                        </div>
                    </div>
                    <div class="product-sync-nav single-product">
                        <div class="single-product">
                            <div class="product-thumb">
                                <a href="javascript:void(0)">
                                    <img src="{{$product->thumbnail}}" alt="product-thumb"/></a>
                            </div>
                        </div>
                        <!-- single-product end -->
                        @foreach($product->images as $image)
                            <div class="single-product">
                                <div class="product-thumb">
                                    <a href="javascript:void(0)">
                                        <img src="{{$image->path}}" alt="product-thumb"
                                        /></a>
                                </div>
                            </div>
                            <!-- single-product end -->
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="single-product-info">
                        <div class="single-product-head">
                            <h2 class="title mb-20">{{$product->name}}</h2>
                            <div class="star-content mb-20">
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                                <span class="star-on"><i class="ion-ios-star"></i> </span>
                            </div>
                        </div>
                        <div class="product-body mb-40">
                            <div class="d-flex align-items-center mb-30">
                                @if($product->sale == '1')
                                <span class="product-price mr-20">
                                    <del class="del">{{ number_format($product->price, 0, '', '.') }} đ</del>
                                    <span class="onsale">{{ number_format(($product->price * 0.9), 0, '', '.') }} đ</span>
                                </span>
                                <span class="badge position-static bg-dark rounded-0">Save 10%</span>
                                @else
                                    <span class="product-price mr-20">{{ number_format($product->price, 0, '', '.') }} đ</span>
                                @endif
                            </div>
                            <div>
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="product-footer">
                            <div class="product-count style d-flex flex-column flex-sm-row mt-30 mb-30">
                                <div class="count d-flex">
                                    <input type="number" name="qty" id="qty" min="1" max="{{$product->stock}}" step="1" value="1" disabled/>
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
                                    <a href="#" class="btn btn-dark btn--xl mt-5 mt-sm-0">
                                        <span class="mr-2"><i class="ion-android-add"></i></span>
                                        Thêm vào giỏ hàng
                                    </a>
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
    </section>
    <!-- product-single end -->

    <!-- product tab start -->
    @include('shared.client.product.product_tab')
    <!-- product tab end -->

    <!-- also like section start -->
    @if(count($same_products) > 1)
        @include('shared.client.product.also_like')
    @endif
    <!-- also like section end -->
@endsection