@extends('layouts.admin.admin')

@section('title', 'Thông báo')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Cài đặt thông báo</h4>
                                                <div class="nk-block-des">
                                                    <p>Bạn sẽ chỉ nhận được thông báo những gì đã kích hoạt.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-head-content">
                                            <h6>Cảnh báo bảo mật</h6>
                                            <p>Bạn sẽ chỉ nhận được những email thông báo những gì bạn muốn.</p>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block-content">
                                        <div class="gy-3">
                                            <div class="g-item">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="unusual-activity">
                                                    <label class="custom-control-label" for="unusual-activity">Gửi email cho tôi bất cứ khi nào gặp hoạt động bất thường</label>
                                                </div>
                                            </div>
                                            <div class="g-item">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="new-browser">
                                                    <label class="custom-control-label" for="new-browser">Gửi email cho tôi nếu trình duyệt mới được sử dụng để đăng nhập</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-content -->
                                    <div class="nk-block-head nk-block-head-sm">
                                        <div class="nk-block-head-content">
                                            <h6>Tin tức</h6>
                                            <p>Bạn sẽ chỉ nhận được những email thông báo những gì bạn muốn.</p>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block-content">
                                        <div class="gy-3">
                                            <div class="g-item">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="latest-sale">
                                                    <label class="custom-control-label" for="latest-sale">Thông báo cho tôi qua email về doanh số bán hàng và tin tức mới nhất</label>
                                                </div>
                                            </div>
                                            <div class="g-item">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="feature-update">
                                                    <label class="custom-control-label" for="feature-update">Gửi email cho tôi về các tính năng và bản cập nhật mới</label>
                                                </div>
                                            </div>
                                            <div class="g-item">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" checked id="account-tips">
                                                    <label class="custom-control-label" for="account-tips">Gửi email cho tôi về các mẹo sử dụng tài khoản</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-content -->
                                </div>
                                @include('shared.admin.layouts.user_profile.profile_sidebar')
                            </div><!-- .card-inner -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection

