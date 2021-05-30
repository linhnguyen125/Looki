<div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
    <div class="inner">
        <div class="border-bottom py-2 mb-2">
            <div class="row">
                <div class="col-6">
                    @if(Route::has('login'))
                        @auth
                            <span class="text-left">
                                <img style="height: 30px" class="img-fluid rounded-circle" src="{{Auth::user()->avatar}}" alt="">
                            </span>
                        @endauth
                    @endif
                </div>
                <div class="col-6 text-right">
                    <button class="offcanvas-close">×</button>
                </div>
            </div>
        </div>
        <div class="offcanvas-head mb-4">
            <nav class="offcanvas-top-nav">
                <ul class="d-flex flex-wrap">
                    <li class="my-2 mx-2">
                        <a href="wishlist.html">
                            <i class="icon-bag"></i> Wishlist <span>(0)</span></a
                        >
                    </li>
                    <li class="my-2 mx-2">
                        <a href="wishlist.html">
                            <i class="ion-android-favorite-outline"></i> Wishlist
                            <span>(3)</span></a
                        >
                    </li>
                    <li class="my-2 mx-2">
                        <a href="compare.html"
                        ><i class="ion-ios-loop-strong"></i> Compare <span>(2)</span>
                        </a>
                    </li>
                    <li class="my-2 mx-2">
                        <a class="search search-toggle" href="javascript:void(0)">
                            <i class="icon-magnifier"></i> Search</a
                        >
                    </li>
                </ul>
            </nav>
        </div>
        <nav class="offcanvas-menu">
            <ul>
                <li class="{{session('module') == 'home' ? 'active' : ' '}}">
                    <a href="{{url('/')}}"><span class="menu-text">Trang chủ</span></a>
                </li>
                <li class="{{session('module') == 'product' ? 'active' : ' '}}">
                    <a href="#"><span class="menu-text">Sản phẩm</span></a>
                    <ul class="offcanvas-submenu">

                        <!-- col fashion -->
                        @foreach($fashions as $name => $fashion)
                            <li>
                                @foreach($fashion as $slugParent => $itemParents)
                                <a href="{{route('client.category', $slugParent)}}"><span class="menu-text">{{$name}}</span></a>
                                    <ul class="offcanvas-submenu">
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
                            <li>
                                @foreach($cosmetic as $slugParent => $itemParents)
                                    <a href="{{route('client.category', $slugParent)}}"><span class="menu-text">{{$name}}</span></a>
                                    <ul class="offcanvas-submenu">
                                        @foreach($itemParents as $itemParent)
                                            <li>
                                                <a href="{{route('client.category', $itemParent['slug'])}}">{{$itemParent['name']}}</a>
                                            </li>
                                        @endforeach
                                @endforeach
                                    </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li class="{{session('module') == 'news' ? 'active' : ' '}}">
                    <a href="{{route('client.category', 'tin-tuc')}}"><span class="menu-text">Tin tức</span></a>
                </li>
                <li class="{{session('module') == 'blog' ? 'active' : ' '}}">
                    <a href="{{route('client.category', 'blog')}}"><span class="menu-text">Blog</span></a>
                </li>
                <li class="{{session('module') == 'about us' ? 'active' : ' '}}">
                    <a href="blog-grid-3-column.html"><span class="menu-text">Về Looki</span></a>
                </li>
                <li class="{{session('module') == 'contact' ? 'active' : ' '}}"><a href="contact.html">Liên hệ</a></li>
                @if(Route::has('login'))
                    @auth
                        <li>
                            <a href="#"><span class="menu-text">{{Auth::user()->name}}</span></a>
                            <ul class="offcanvas-submenu">
                                <li><a href="{{route('client.account')}}">Tài khoản</a></li>
                                <li><a href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                                   document.getElementById('mobile-logout-form').submit();">Đăng xuất</a></li>
                                <form id="mobile-logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
        <div class="offcanvas-social py-30">
            <ul>
                <li>
                    <a href="#"><i class="icon-social-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-google"></i></a>
                </li>
                <li>
                    <a href="#"><i class="icon-social-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
