<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{route('dashboard')}}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('assets/admin/images/logo.png')}}"
                     srcset="{{asset('assets/admin/images/logo2x.png 2x')}}" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('assets/admin/images/logo-dark.png')}}"
                     srcset="{{asset('assets/admin/images/logo-dark2x.png 2x')}}" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{asset('assets/admin/images/logo-small.png')}}"
                     srcset="{{asset('assets/admin/images/logo-small2x.png 2x')}}" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{route('dashboard')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Bảng điều khiển</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="{{route('admin.order.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag-fill"></em></span>
                            <span class="nk-menu-text">Hóa đơn</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-layers-fill"></em></span>
                            <span class="nk-menu-text">Danh mục</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.category.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Sản phẩm</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.category_news.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Tin tức</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.category_blog.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Blog</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-package-fill"></em></span>
                            <span class="nk-menu-text">Sản phẩm</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.product.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Danh sách</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.product.create')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Thêm mới</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="{{route('admin.discount.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tags-fill"></em></span>
                            <span class="nk-menu-text">Khuyến mại</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-b-firefox"></em></span>
                            <span class="nk-menu-text">Tin tức</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.news.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Danh sách</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.news.create')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Thêm mới</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-blogger"></em></span>
                            <span class="nk-menu-text">Blog</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.blog.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Danh sách</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.blog.create')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Thêm mới</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Khách hàng</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.customer.index')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Danh sách</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-check-fill"></em></span>
                            <span class="nk-menu-text">Quản trị viên</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="{{route('admin.user.index')}}" class="nk-menu-link"><span class="nk-menu-text">Danh sách</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{route('admin.user.create')}}" class="nk-menu-link"><span
                                        class="nk-menu-text">Thêm mới</span></a>
                            </li>
                        </ul><!-- .nk-menu-sub -->
                    </li><!-- .nk-menu-item -->

                    <li class="nk-menu-item">
                        <a href="html/ecommerce/supports.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span>
                            <span class="nk-menu-text">Hỗ trợ</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a href="html/ecommerce/settings.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-opt-alt-fill"></em></span>
                            <span class="nk-menu-text">Cài đặt</span>
                        </a>
                    </li><!-- .nk-menu-item -->

                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
