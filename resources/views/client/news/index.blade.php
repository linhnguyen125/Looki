@extends('layouts.client.client')

@section('title', 'Tin tức')

@section('css')
    <style>
        div.text {
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 6rem;
        }

        h3.title {
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 50px;
            font-size: 14px !important;
        }

        div.desc {
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 50px;
            font-size: 14px !important;
        }

        a.see-more{
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    @include('shared.client.news.breadcrumb')
    <!-- news tab start -->
    <section class="blog-section py-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Tin nổi bật</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-3">
                    <div class="row">
                        @foreach($featured_newses_col_1 as $item)
                            <div class="col-12 mb-10">
                                <div class="single-blog text-left">
                                    <a
                                        class="blog-thumb mb-10 zoom-in d-block overflow-hidden"
                                        href="{{route('client.news', $item->slug)}}">
                                        <img src="{{$item->thumbnail}}" alt="blog-thumb-naile"/>
                                    </a>
                                    <div class="blog-post-content">
                                        <p class="sub-title">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                        </p>
                                        <h3 class="title">
                                            <a href="{{route('client.news', $item->slug)}}">{{$item->name}}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    @foreach($featured_newses_col_2 as $item)
                        <div class="col-12 mb-10">
                            <div class="single-blog text-left">
                                <a
                                    class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                    href="{{route('client.news', $item->slug)}}">
                                    <img src="{{$item->thumbnail}}" alt="blog-thumb-naile"/>
                                </a>
                                <div class="blog-post-content">
                                    <p class="sub-title">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                    </p>
                                    <h3 class="title mt-15">
                                        <a href="{{route('client.news', $item->slug)}}">{{$item->name}}</a>
                                    </h3>
                                    <div class="desc">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-12 col-lg-3 col-md-3">
                    @foreach($featured_newses_col_3 as $item)
                        <div class="col-12 mb-10">
                            <div class="single-blog text-left">
                                <a
                                    class="blog-thumb mb-10 zoom-in d-block overflow-hidden"
                                    href="{{route('client.news', $item->slug)}}">
                                    <img src="{{$item->thumbnail}}" alt="blog-thumb-naile"/>
                                </a>
                                <div class="blog-post-content">
                                    <p class="sub-title">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                    </p>
                                    <h3 class="title">
                                        <a href="{{route('client.news', $item->slug)}}">{{$item->name}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Tin tức</h2>
                    </div>
                </div>
                @foreach($news_newses as $news)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-30">
                        <div class="single-blog text-left">
                            <a
                                class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="{{route('client.news', $news->slug)}}">
                                <img src="{{$news->thumbnail}}" alt="blog-thumb-naile"/>
                            </a>
                            <div class="blog-post-content">
                                <p class="sub-title">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($news->created_at)->format('d M, Y') }}
                                </p>
                                <h3 class="title mb-15 mt-15">
                                    <a href="{{route('client.news', $news->slug)}}">{{$news->name}}</a>
                                </h3>
                                <div class="text">
                                    {!! $news->description !!}
                                </div>
                                <a class="read-more" href="{{route('client.news', $news->slug)}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="col-12">
                    <div class="section-title text-center">
                        <a href="{{route('client.category', 'tin-tuc-looki')}}" class="btn btn-dark py-10 rounded-pill see-more">
                            Xem tiếp
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Sự kiện</h2>
                    </div>
                </div>
                @foreach($news_events as $news)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-30">
                        <div class="single-blog text-left">
                            <a
                                class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="{{route('client.news', $news->slug)}}">
                                <img src="{{$news->thumbnail}}" alt="blog-thumb-naile"/>
                            </a>
                            <div class="blog-post-content">
                                <p class="sub-title">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($news->created_at)->format('d M, Y') }}
                                </p>
                                <h3 class="title mb-15 mt-15">
                                    <a href="{{route('client.news', $news->slug)}}">{{$news->name}}</a>
                                </h3>
                                <div class="text">
                                    {!! $news->description !!}
                                </div>
                                <a class="read-more" href="{{route('client.news', $news->slug)}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="col-12">
                    <div class="section-title text-center">
                        <a href="{{route('client.category', 'su-kien')}}" class="btn btn-dark py-10 rounded-pill see-more">
                            Xem tiếp
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news tab end -->
@endsection
