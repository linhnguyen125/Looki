@extends('layouts.client.client')

@section('title', 'Blog')

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
            max-height: 50px;
            font-size: 14px !important;
        }

        div.desc{
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 100px;
        }

        @media only screen and (max-width: 767px){
            div.desc-col-2{
                display: block !important;
                white-space: initial;
                overflow: hidden;
                text-overflow: ellipsis;
                max-height: 100px;
            }
        }

        a.see-more{
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    @include('shared.client.blog.breadcrumb')
    <!-- news tab start -->
    <section class="blog-section py-80">
        <div class="container">
            <div class="row mb-25">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h2 class="title pb-3 mb-3">Blog</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-8 col-md-8">
                    <div class="row">
                        @foreach($blogs_col_1 as $item)
                            <div class="col-12 mb-10">
                                <div class="single-blog text-left">
                                    <a
                                        class="blog-thumb mb-10 zoom-in d-block overflow-hidden"
                                        href="{{route('client.blog', $item->slug)}}">
                                        <img src="{{$item->thumbnail}}" alt="blog-thumb-naile"/>
                                    </a>
                                    <div class="blog-post-content">
                                        <p class="sub-title">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                        </p>
                                        <h3 class="title text-uppercase mb-10 mt-15">
                                            <a href="{{route('client.blog', $item->slug)}}">{{$item->name}}</a>
                                        </h3>
                                        <div class="desc">
                                            {!! $item->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-4">
                    @foreach($blogs_col_2 as $item)
                        <div class="col-12 mb-15">
                            <div class="single-blog text-left">
                                <a
                                    class="blog-thumb mb-10 zoom-in d-block overflow-hidden"
                                    href="{{route('client.blog', $item->slug)}}">
                                    <img src="{{$item->thumbnail}}" alt="blog-thumb-naile"/>
                                </a>
                                <div class="blog-post-content">
                                    <p class="sub-title">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                    </p>
                                    <h3 class="title text-uppercase mt-10 mb-15">
                                        <a href="{{route('client.blog', $item->slug)}}">{{$item->name}}</a>
                                    </h3>
                                    <div class="desc-col-2 d-none">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @foreach($blogs_by_category as $key => $blog_by_category)
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title pb-3 mb-3">{{$key}}</h2>
                        </div>
                    </div>
                    @foreach($blog_by_category as $item)
                        <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-30">
                            <div class="single-blog text-left">
                                <a
                                    class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                    href="{{route('client.blog', $item->slug)}}">
                                    <img src="{{$item->thumbnail}}" alt="blog-thumb-naile"/>
                                </a>
                                <div class="blog-post-content">
                                    <p class="sub-title">
                                        <i class="far fa-calendar-alt"></i>
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M, Y') }}
                                    </p>
                                    <h3 class="title mb-15 mt-15">
                                        <a href="{{route('client.blog', $item->slug)}}">{{$item->name}}</a>
                                    </h3>
{{--                                    <div class="text">--}}
{{--                                        {!! $item->description !!}--}}
{{--                                    </div>--}}
                                    <a class="read-more" href="{{route('client.blog', $item->slug)}}">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-12">
                            <div class="section-title text-center">
                                <a href="{{route('client.blog', $item->blog_category->slug)}}" class="btn btn-dark py-10 rounded-pill see-more">
                                    Xem tiếp
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <!-- news tab end -->
@endsection
