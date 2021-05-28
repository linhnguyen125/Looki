@extends('layouts.client.client')

@section('title')
    {{$category->name}}
@endsection

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
        }

        @media only screen and (max-width: 767px) {
            div.text{
                display: none !important;
            }
        }
    </style>
@endsection

@section('content')
    @include('shared.client.blog.breadcrumb-v2')
    <!-- news tab start -->
    <section class="blog-section py-80">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-4 mb-30">
                        <div class="single-blog text-left">
                            <a
                                class="blog-thumb mb-20 zoom-in d-block overflow-hidden"
                                href="{{route('client.category', $blog->slug)}}">
                                <img src="{{$blog->thumbnail}}" alt="blog-thumb-naile"/>
                            </a>
                            <div class="blog-post-content">
                                <p class="sub-title">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}
                                </p>
                                <h3 class="title mb-15 mt-15">
                                    <a href="{{route('client.category', $blog->slug)}}">{{$blog->name}}</a>
                                </h3>
                                <div class="text">
                                    {!! $blog->description !!}
                                </div>
                                <a class="read-more" href="{{route('client.category', $blog->slug)}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <nav class="pagination-section mt-30">
                        {!! $blogs->withQueryString()->onEachSide(1)->links() !!}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- news tab end -->
@endsection
