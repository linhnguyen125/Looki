@extends('layouts.client.client')

@section('title', 'Mỹ phầm và Thời trang Việt Nam chất lượng cao')

@section('content')
    <!-- main slider start -->
    @include('shared.client.home.main-slider')
    <!-- main slider end -->

    <!-- staic media start -->
    @include('shared.client.home.staic-media')
    <!-- staic media end -->

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
