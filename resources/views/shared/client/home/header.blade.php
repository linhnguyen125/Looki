<header>
    <!-- header top start -->
    <div class="header-top theme1 theme-bg py-15">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 order-last order-sm-first">
                    <div
                        class="d-flex justify-content-center justify-content-sm-start align-items-center">
                        <div class="social-network2 modify">
                            <ul class="d-flex">
                                <li>
                                    <a href="https://www.facebook.com/profile.php?id=100015452952494" target="_blank"><span
                                            class="icon-social-facebook"></span></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/" target="_blank"><span
                                            class="icon-social-twitter"></span></a>
                                </li>
                                <li>
                                    <a href="https://www.youtube.com/channel/UCnVG2vgTPlOTb23Uc4bUnew" target="_blank"
                                    ><span class="icon-social-youtube"></span
                                        ></a>
                                </li>
                                <li class="mr-0">
                                    <a href="https://www.instagram.com/linh.looki/" target="_blank">
                                        <span class="icon-social-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="media static-media ml-4 d-flex align-items-center">
                            <div class="media-body">
                                <div class="phone modify">
                                    <a href="tel:(+84)981958120" class="text-white">
                                        <i class="icon-call-out mr-1"></i> (+84) 981 958 120</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <nav class="navbar-top modify pb-2 pb-sm-0 position-relative">
                        <ul class="d-flex justify-content-center justify-content-md-end align-items-center">
                            @if(Route::has('login'))
                                @auth
                                    <li>
                                        <a href="#" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" ria-expanded="false">
                                            {{Auth::user()->name}}
                                            <span>
                                                <img style="height: 25px" class="img-fluid rounded-circle" src="{{Auth::user()->avatar}}" alt="">
                                            </span>
                                        </a>
                                        <ul
                                            class="topnav-submenu dropdown-menu"
                                            aria-labelledby="dropdown1">
                                            <li><a href="{{route('client.account')}}">Tài khoản</a></li>
                                            <li><a href="{{route('logout')}}"
                                                    onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">Đăng xuất</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a
                                            href="{{ route('login') }}">Đăng nhập</i>
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li>
                                            <a
                                                href="{{ route('register') }}">Đăng ký
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- header top end -->

    <!-- header-middle satrt -->
    <div id="sticky" class="header-middle theme1 py-15 py-lg-0">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-6 col-lg-2">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset('assets/client/img/logo/logo.png')}}" alt="logo"/></a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <ul class="main-menu d-flex justify-content-center">
                        <!-- Home -->
                        <li class="ml-0 {{session('module') == 'home' ? 'active' : ' '}}">
                            <a href="{{url('/')}}" class="pl-0">Trang chủ</a>
                        </li>

                        <!-- Sản phẩm -->
                        <li class="position-static {{session('module') == 'product' ? 'active' : ' '}}">
                            <a href="#" onclick="return false;">Sản phẩm <i class="ion-ios-arrow-down"></i></a>
                            <ul class="mega-menu row">
                                <!-- col fashion -->
                                @foreach($fashions as $name => $fashion)
                                    <li class="col-2">
                                        <ul>
                                            @foreach($fashion as $slugParent => $itemParents)
                                                <li class="mega-menu-title"><a href="{{route('client.category', $slugParent)}}">{{$name}}</a></li>
                                                @foreach($itemParents as $itemParent)
                                                    <li>
                                                        <a href="{{route('client.category', $itemParent['slug'])}}">{{$itemParent['name']}}</a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach

                            <!-- col cosmetics -->
                                @foreach($cosmetics as $name => $cosmetic)
                                    <li class="col-2">
                                        <ul>
                                            @foreach($cosmetic as $slugParent => $itemParents)
                                                <li class="mega-menu-title"><a href="{{route('client.category', $slugParent)}}">{{$name}}</a></li>
                                                @foreach($itemParents as $itemParent)
                                                    <li>
                                                        <a href="{{route('client.category', $itemParent['slug'])}}">{{$itemParent['name']}}</a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </li>
                            @endforeach
                            <!-- img -->
                                <li class="col-6 mt-4">
                                    <a href="single-product.html" class="zoom-in overflow-hidden">
                                        <img src="{{asset('assets/client/img/mega-menu/pexels-monstera-6311720.jpg')}}" alt="img"/></a>
                                </li>

                                <!-- img -->
                                <li class="col-6 mt-4">
                                    <a href="single-product.html" class="zoom-in overflow-hidden">
                                        <img src="{{asset('assets/client/img/mega-menu/pexels-lumn-167703.jpg')}}" alt="img"/></a>
                                </li>
                            </ul>
                        </li>

                        <!-- News -->
                        <li class="{{session('module') == 'news' ? 'active' : ' '}}">
                            <a href="{{route('client.category', 'tin-tuc')}}">Tin tức</a>
                        </li>

                        <!-- Blog -->
                        <li class="{{session('module') == 'blog' ? 'active' : ' '}}">
                            <a href="{{route('client.category', 'blog')}}">Blog</a>
                        </li>

                        <!-- About page -->
                        <li class="{{session('module') == 'about us' ? 'active' : ' '}}">
                            <a href="{{route('client.category', 've-looki')}}">Về Looki</a>
                        </li>

                        <!-- Contact page -->
                        <li class="{{session('module') == 'contact' ? 'active' : ' '}}">
                            <a href="{{route('client.category', 'lien-he')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <div class="col-6 col-lg-2">
                    <!-- search-form end -->
                    <div class="d-flex align-items-center justify-content-end">
                        <!-- static-media end -->
                        <div class="cart-block-links theme1 d-none d-sm-block">
                            <ul class="d-flex">
                                <!-- search -->
                                <li>
                                    <a href="javascript:void(0)" class="search search-toggle">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <!-- compare -->
                                <li>
                                    <a href="compare.html">
                                    <span class="position-relative">
                                      <i class="icon-shuffle"></i>
                                      <span class="badge cbdg1">1</span>
                                    </span>
                                    </a>
                                </li>
                                <!-- wish list -->
                                <li>
                                    <a class="offcanvas-toggle" href="#offcanvas-wishlist">
                                    <span class="position-relative">
                                      <i class="icon-heart"></i>
                                      <span class="badge cbdg1">3</span>
                                    </span>
                                    </a>
                                </li>
                                <!-- cart -->
                                <li class="mr-xl-0 cart-block position-relative">
                                    <a class="offcanvas-toggle" href="#offcanvas-cart">
                                    <span class="position-relative">
                                      <i class="icon-bag"></i>
                                      <span class="badge cbdg1">{{Cart::content()->count()}}</span>
                                    </span>
                                    </a>
                                </li>
                                <!-- cart block end -->
                            </ul>
                        </div>

                        <div class="mobile-menu-toggle theme1 d-lg-none">
                            <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                                <svg viewbox="0 0 700 550">
                                    <path
                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                        id="top"
                                    ></path>
                                    <path d="M300,320 L540,320" id="middle"></path>
                                    <path
                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                        id="bottom"
                                        transform="translate(480, 320) scale(1, -1) translate(-480, -318)"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-middle end -->
</header>
