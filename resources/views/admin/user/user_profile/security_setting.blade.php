@extends('layouts.admin.admin')

@section('title', 'Cài đặt bảo mật')

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
                                                <h4 class="nk-block-title">Cài đặt bảo mật</h4>
                                                <div class="nk-block-des">
                                                    <p>Các cài đặt này giúp bạn giữ an toàn cho tài khoản của mình.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="card">
                                            <div class="card-inner-group">
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                        <div class="nk-block-text">
                                                            <h6>Lưu nhật ký hoạt động của tôi</h6>
                                                            <p>Bạn có thể lưu tất cả nhật ký hoạt động của mình bao gồm cả hoạt động bất thường được phát hiện.</p>
                                                        </div>
                                                        <div class="nk-block-actions">
                                                            <ul class="align-center gx-3">
                                                                <li class="order-md-last">
                                                                    <div class="custom-control custom-switch mr-n2">
                                                                        <input type="checkbox" class="custom-control-input" checked="" id="activity-log">
                                                                        <label class="custom-control-label" for="activity-log"></label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap g-3">
                                                        <div class="nk-block-text">
                                                            <h6>Thay đổi mật khẩu</h6>
                                                            <p>Đặt một mật khẩu duy nhất để bảo vệ tài khoản của bạn.</p>
                                                        </div>
                                                        <div class="nk-block-actions flex-shrink-sm-0">
                                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                <li class="order-md-last">
                                                                    <a href="#" class="btn btn-primary">Thay đổi mật khẩu</a>
                                                                </li>
                                                                <li>
                                                                    <em class="text-soft text-date fs-12px">Last changed: <span>Oct 2, 2019</span></em>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap flex-md-nowrap g-3">
                                                        <div class="nk-block-text">
                                                            <h6>2 Factor Auth &nbsp; <span class="badge badge-success ml-0">Enabled</span></h6>
                                                            <p>Bảo mật tài khoản của bạn với bảo mật 2FA. Khi nó được kích hoạt, bạn sẽ không chỉ cần nhập mật khẩu của mình mà còn phải nhập mã đặc biệt bằng ứng dụng. Bạn có thể nhận mã này bằng trong ứng dụng dành cho thiết bị di động. </p>
                                                        </div>
                                                        <div class="nk-block-actions">
                                                            <a href="#" class="btn btn-primary">Disable</a>
                                                        </div>
                                                    </div>
                                                </div><!-- .card-inner -->
                                            </div><!-- .card-inner-group -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                </div><!-- .card-inner -->
                                @include('shared.admin.layouts.user_profile.profile_sidebar')
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
