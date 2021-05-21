<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
          content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.png')}}">
    <!-- Page Title  -->
    <title>Admin | @yield('title')</title>
    <!-- StyleSheets  -->
    @yield('css')
    <link rel="stylesheet" href="{{asset('assets/admin/css/dashlite.css?ver=2.2.0')}}">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/admin/css/theme.css?ver=2.2.0')}}">
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
    @include('shared.admin.layouts.sidebar')
    <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            @include('shared.admin.layouts.main_header')
            <!-- main header @e -->

            <!-- content @s -->
            @yield('content')
            <!-- content @e -->

            <!-- footer @s -->
            @include('shared.admin.layouts.footer')
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{asset('assets/admin/js/bundle.js?ver=2.2.0')}}"></script>
<script src="{{asset('assets/admin/js/scripts.js?ver=2.2.0')}}"></script>
<script src="{{asset('assets/admin/js/charts/chart-ecommerce.js?ver=2.2.0')}}"></script>
@yield('script')
</body>

</html>
