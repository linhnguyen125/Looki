@extends('layouts.client.client')

@section('title')
    {{$news->name}}
@endsection

@section('css')
    <style>
        h3.title {
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 50px;
            font-size: 14px !important;
        }

        @media only screen and (max-width: 565px){
            div.blog-single-share{
                margin-top: 15px;
            }
        }
    </style>
@endsection

@section('content')
    @include('shared.client.news.breadcrumb-v2')
    <!-- news tab start -->
    <section class="blog-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="blog-posts">
                        <div class="single-blog-post blog-grid-post">
                            <div class="blog-post-media">
                                <div class="blog-image single-blog">
                                    <a href="{{$news->thumbnail}}"><img
                                            class="object-fit-none"
                                            src="{{$news->thumbnail}}"
                                            alt="blog-thumb-naile"/></a>
                                </div>
                            </div>
                            <div class="blog-post-content-inner">
                                <h4 class="blog-title">{{$news->name}}</h4>
                                <ul class="blog-page-meta">
                                    <li>
                                        <i class="ion-calendar"></i> {{ \Carbon\Carbon::parse($news->created_at)->format('d M, Y') }}
                                    </li>
                                    <li>
                                        View: 123
                                    </li>
                                </ul>
                            </div>

                            <div class="single-post-content">
                                {!! $news->detail !!}
                            </div>
                        </div>
                        <!-- single blog post -->
                    </div>
                    <div class="blog-single-tags-share d-sm-flex justify-content-between">
                        <div class="blog-single-tags d-flex">
                            <span class="title">Tags: </span>
                            <ul class="tag-list">
                                @php
                                    $tags = explode(',', $news->meta_keywords);
                                    foreach ($tags as $tag){
                                        echo '<li class="px-2 border text-capitalize"><a href="#">'. $tag .'</a></li>';
                                    }
                                @endphp
                            </ul>
                        </div>
                        <div class="blog-single-share d-flex">
                            <span class="title">Chia sẻ:</span>
                            <ul class="social">
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
                                    <a href="#"><i class="ion-social-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog-related-post">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <!-- Section Title -->
                                <div class="section-title underline-shape">
                                    <h2>Bài viết liên quan</h2>
                                </div>
                                <!-- Section Title -->
                            </div>
                        </div>
                        <div class="row">
                            @foreach($same_newses as $same_news)
                                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                                    <div class="blog-post-media">
                                        <div class="blog-image single-blog">
                                            <a href="{{route('client.category', $same_news->slug)}}">
                                                <img src="{{$same_news->thumbnail}}" alt="blog"/>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="blog-post-content">
                                        <h3 class="title mb-15">
                                            <a href="{{route('client.category', $same_news->slug)}}">{{$same_news->name}}</a>
                                        </h3>
                                        <p class="sub-title">
                                            <i class="ion-calendar"></i> {{ \Carbon\Carbon::parse($same_news->created_at)->format('d M, Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- news tab end -->
@endsection
