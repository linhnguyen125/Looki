<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    @yield('seo')
    <title>Looki - @yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/client/img/favicon.ico')}}"/>

    <link rel="stylesheet" href="{{asset('assets/client/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/ionicons.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/simple-line-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/plugins/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/plugins/plugins.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/style.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/client/css/custom.css')}}"/>
    @yield('css')

</head>

<body>


<!-- offcanvas-overlay start -->
<div class="offcanvas-overlay"></div>
<!-- offcanvas-overlay end -->

<!-- offcanvas-mobile-menu start -->
@include('shared.client.home.offcanvas-mobile-menu')
<!-- offcanvas-mobile-menu end -->

<!-- OffCanvas Wishlist Start -->
@include('shared.client.home.offcanvas-wishlist')
<!-- OffCanvas Wishlist End -->

<!-- OffCanvas Cart Start -->
@include('shared.client.home.offcanvas-cart')
<!-- OffCanvas Cart End -->

<!-- header start -->
@include('shared.client.home.header')
<!-- header end -->

<!-- content start -->
@yield('content')
<!-- content end -->

<!-- footer strat -->
@include('shared.client.home.footer')
<!-- footer end -->

<!-- search-box and overlay start -->
@include('shared.client.home.search-box-and-overlay')
<!-- search-box and overlay end -->

<script src="{{asset('assets/client/js/vendor/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/client/js/vendor/modernizr-3.7.1.min.js')}}"></script>
<script src="{{asset('assets/client/js/popper.min.js')}}"></script>
<script src="{{asset('assets/client/js/plugins/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/client/js/plugins/plugins.js')}}"></script>
<script src="{{asset('assets/client/js/plugins/ajax-contact.js')}}"></script>
<script src="{{asset('assets/client/js/main.js')}}"></script>
@yield('script')


</body>

</html>
