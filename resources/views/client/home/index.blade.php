@extends('layouts.client.client')

@section('title', 'Mỹ phầm và Thời trang Việt Nam chất lượng cao')

@section('css')
    <style>
        h3.popular-title{
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 50px;
        }

        section.product-tab h3.title{
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 50px;
        }

        section.blog-section h3.title{
            white-space: initial;
            overflow: hidden;
            text-overflow: ellipsis;
            height: 40px;
        }

        @media only screen and (max-width: 990px) {
            section.product-tab h3.title{
                white-space: initial;
                overflow: hidden;
                text-overflow: ellipsis;
                height: 40px;
            }
        }

        @media only screen and (min-width: 992px) {
            div.product-body{
                min-height: 180px;
            }
        }

        @media only screen and (max-width: 768px) {
            div.common-banner{
                display: none;
            }
            div.popular-section{
                padding-top: 50px;
            }
            section.featured-slider h3.title{
                white-space: initial;
                overflow: hidden;
                text-overflow: ellipsis;
                height: 62px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- main slider start -->
    @include('shared.client.home.main-slider')
    <!-- main slider end -->

    <!-- static media start -->
    @include('shared.client.home.static-media')
    <!-- static media end -->

    <!-- common banner  start -->
    @include('shared.client.home.common-banner')
    <!-- common banner  end -->

    <!-- popular-section  start -->
    @include('shared.client.home.popular-section')
    <!-- popular-section  end -->

    <!-- product tab start -->
    @include('shared.client.home.product-tab')
    <!-- product tab end -->

    <!-- common banner  start -->
    @include('shared.client.home.common-banner-2')
    <!-- common banner  end -->

    <!-- brand slider start -->
    @include('shared.client.home.brand-slider')
    <!-- brand slider end -->

    <!-- featured  slider start-->
    @include('shared.client.home.featured-slider')
    <!-- featured  slider end-->

    <!-- blog-section start -->
    @include('shared.client.home.blog-section')
    <!-- blog-section end -->
@endsection
