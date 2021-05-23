<div id="offcanvas-mobile-menu" class="offcanvas theme1 offcanvas-mobile-menu">
    <div class="inner">
        <div class="border-bottom mb-4 pb-4 text-right">
            <button class="offcanvas-close">×</button>
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
                <li>
                    <a href="#"><span class="menu-text">Trang chủ</span></a>
                </li>
                <li>
                    <a href="#"><span class="menu-text">Sản phẩm</span></a>
                    <ul class="offcanvas-submenu">

                        <!-- col fashion -->
                        @foreach($fashions as $name => $fashion)
                            <li>
                                @foreach($fashion as $slugParent => $itemParents)
                                <a href="{{$slugParent}}"><span class="menu-text">{{$name}}</span></a>
                                    <ul class="offcanvas-submenu">
                                        @foreach($itemParents as $itemParent)
                                            <li>
                                                <a href="{{$itemParent['slug']}}">{{$itemParent['name']}}</a>
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
                                    <a href="{{$slugParent}}"><span class="menu-text">{{$name}}</span></a>
                                    <ul class="offcanvas-submenu">
                                        @foreach($itemParents as $itemParent)
                                            <li>
                                                <a href="{{$itemParent['slug']}}">{{$itemParent['name']}}</a>
                                            </li>
                                        @endforeach
                                        @endforeach
                                    </ul>
                            </li>
                        @endforeach

                    </ul>
                </li>
                <li>
                    <a href="#"><span class="menu-text">Tin tức</span></a>
                </li>
                <li>
                    <a href="blog-grid-3-column.html"><span class="menu-text">Về chúng tôi</span></a>
                </li>
                <li><a href="contact.html">Liên hệ</a></li>
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
