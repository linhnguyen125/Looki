<div class="popular-section popular-bg1 theme1 bg-white px-md-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title pb-3 mb-3">Sản Phẩm Phổ Biến</h2>
                    <p class="text">
                        Sản phẩm được nhiều khách hàng ưa dùng
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="popular-slider-init dots-style">
                    <!-- slider-item end -->
                    @foreach($popular_products as $popular_product)
                        <div class="slider-item">
                            <div class="card popular-card zoom-in d-block overflow-hidden">
                                <div class="card-body">
                                    <a href="{{route('client.category', $popular_product->slug)}}" class="thumb-naile">
                                        <img
                                            class="d-block mx-auto"
                                            src="{{$popular_product->thumbnail}}"
                                            alt="img"/></a>
                                    <h3 class="popular-title">
                                        <a href="{{route('client.category', $popular_product->slug)}}">{{$popular_product->name}}</a>
                                    </h3>
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
