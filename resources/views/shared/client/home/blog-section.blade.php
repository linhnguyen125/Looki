<section class="blog-section theme1 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title pb-3 mb-3">Tin tức nổi bật</h2>
                    <p class="text">
                        Các tin tức nổi bật về sản phẩm và khuyến mãi của chúng tôi
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="blog-init slick-nav">
                    @foreach($newses as $news)
                        <div class="slider-item">
                            <div class="single-blog">
                                <a
                                    class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                    href="{{route('client.news', $news->slug)}}">
                                    <img src="{{$news->thumbnail}}" alt="blog-thumb-naile"/>
                                </a>
                                <div class="blog-post-content">
                                    <a
                                        class="blog-link theme-color d-inline-block mb-10 text-uppercase"
                                        href="{{$news->news_category->slug}}">{{$news->news_category->name}}</a>
                                    <h3 class="title mb-15">
                                        <a href="{{route('client.news', $news->slug)}}">{{$news->name}}</a>
                                    </h3>
                                    <h5 class="sub-title">
                                        {{ \Carbon\Carbon::parse($news->created_at)->format('d M, Y') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- slider-item end -->
                </div>
            </div>
        </div>
    </div>
</section>
