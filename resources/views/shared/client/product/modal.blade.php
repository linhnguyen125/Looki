<!-- quick-view modal start -->
@foreach($same_products as $same_product)
    <div class="modal fade theme1 style1"
         id="quick-view-{{$same_product->id}}"
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
                                            src="{{$same_product->thumbnail}}"
                                            alt="product-thumb"
                                        />
                                    </div>
                                </div>

                                @foreach($same_product->images as $image)
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
                                                src="{{$same_product->thumbnail}}"
                                                alt="product-thumb"
                                            /></a>
                                    </div>
                                </div>
                                @foreach($same_product->images as $image)
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
                                        {{$same_product->name}}
                                    </h2>
                                    <h4 class="sub-title">Danh mục: {{$same_product->category->name}}</h4>
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
                                      <span class="new-price">{{ number_format($same_product->price, 0, '', '.') }} đ</span>
                                    </span>
                                    <div>
                                        {!! $same_product->description !!}
                                    </div>
                                </div>
                                <div class="product-footer">
                                    <div
                                        class="product-count style d-flex flex-column flex-sm-row my-4">
                                        <div class="count d-flex">
                                            <input type="number" min="1" max="{{$same_product->stock}}" disabled step="1" value="1"/>
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
<!-- quick-view modal end -->
