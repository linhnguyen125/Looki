<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Looki | @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/client/img/favicon.ico')}}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/auth/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/auth/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/auth/font/flaticon.css')}}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('assets/auth/css/style.css')}}">
</head>

<body>
<section class="fxt-template-animation fxt-template-layout3" data-bg-image="{{asset('assets/auth/img/bg29-l-2.jpg')}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12 fxt-none-991">
                <div class="fxt-header">
                    <div class="fxt-transformY-50 fxt-transition-delay-1">
                        <a href="{{url('/')}}" class="fxt-logo"><img src="{{asset('assets/auth/img/logo-bottom.png')}}" alt="Logo"></a>
                    </div>
                    <div class="fxt-transformY-50 fxt-transition-delay-2">
                        <h1 style="color: #f1c40f">Welcome To Looki</h1>
                    </div>
                    <div class="fxt-transformY-50 fxt-transition-delay-3">
                        <p style="color: #f1c40f">Grursus mal suada faci lisis Lorem ipsum dolarorit more ametion consectetur elit.
                            Vesti at bulum nec odio aea the dumm ipsumm ipsum that dolocons rsus mal suada and
                            fadolorit to the dummy consectetur elit the Lorem Ipsum genera.</p>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</section>
<!-- jquery-->
<script src="{{asset('assets/auth/js/jquery-3.5.0.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('assets/auth/js/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('assets/auth/js/bootstrap.min.js')}}"></script>
<!-- Imagesloaded js -->
<script src="{{asset('assets/auth/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- Validator js -->
<script src="{{asset('assets/auth/js/validator.min.js')}}"></script>
<!-- Custom Js -->
<script src="{{asset('assets/auth/js/main.js')}}"></script>

</body>

</html>
