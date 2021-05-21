@extends('layouts.admin.admin')

@section('title', 'Thông tin cá nhân')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        @include('shared.admin.layouts.alert')
                        @if($errors->any())
                            <div class="example-alert mb-1">
                                <div class="alert alert-pro alert-danger alert-dismissible">
                                    <div class="alert-text">
                                        <h6>Thất bại</h6>
                                        @foreach ($errors->all() as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                    <button class="close" data-dismiss="alert"></button>
                                </div>
                            </div>
                        @endif
                        @error('avatar')
                        <div class="example-alert mb-1">
                            <div class="alert alert-pro alert-danger alert-dismissible">
                                <div class="alert-text">
                                    <h6>Thất bại</h6>
                                    <p>{{$message}}</p>
                                </div>
                                <button class="close" data-dismiss="alert"></button>
                            </div>
                        </div>
                        @enderror
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Thông tin cá nhân</h4>
                                                <div class="nk-block-des">
                                                    <p>Thông tin cơ bản, như tên và địa chỉ của bạn mà bạn sử dụng trên
                                                        hệ thống.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                   data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Thông tin cơ bản</h6>
                                            </div>
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Họ và tên</span>
                                                    <span class="data-value">{{$admin->name}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em
                                                            class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Email</span>
                                                    <span class="data-value">{{$admin->email}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more disable"><em
                                                            class="icon ni ni-lock-alt"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Số điện thoại</span>
                                                    <span class="data-value">{{$admin->phone}}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em
                                                            class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                <div class="data-col">
                                                    <span class="data-label">Ngày sinh</span>
                                                    <span
                                                        class="data-value">{{ \Carbon\Carbon::parse($admin->date_of_birth)->format('d M, Y') }}</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em
                                                            class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit"
                                                 data-tab-target="#address">
                                                <div class="data-col">
                                                    <span class="data-label">Địa chỉ</span>
                                                    @if($admin->address)
                                                        <span class="data-value">
                                                            {{$admin->address['province']}}, {{$admin->address['district']}}, {{$admin->address['ward']}} <br>
                                                            {{$admin->address['more']}}
                                                        </span>
                                                    @else
                                                        <span class="data-value text-soft">
                                                            Chưa cập nhật
                                                        </span>
                                                    @endif

                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em
                                                            class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->
                                        </div><!-- data-list -->
                                        <div class="nk-data data-list">
                                            <div class="data-head">
                                                <h6 class="overline-title">Cài đặt thêm</h6>
                                            </div>
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Language</span>
                                                    <span class="data-value">English (United State)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                                                      data-target="#profile-language"
                                                                                      class="link link-primary">Change
                                                        Language</a></div>
                                            </div><!-- data-item -->
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Date Format</span>
                                                    <span class="data-value">M d, YYYY</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                                                      data-target="#profile-language"
                                                                                      class="link link-primary">Change</a>
                                                </div>
                                            </div><!-- data-item -->
                                            <div class="data-item">
                                                <div class="data-col">
                                                    <span class="data-label">Timezone</span>
                                                    <span class="data-value">Bangladesh (GMT +6)</span>
                                                </div>
                                                <div class="data-col data-col-end"><a href="#" data-toggle="modal"
                                                                                      data-target="#profile-language"
                                                                                      class="link link-primary">Change</a>
                                                </div>
                                            </div><!-- data-item -->
                                        </div><!-- data-list -->
                                    </div><!-- .nk-block -->
                                </div>
                                @include('shared.admin.layouts.user_profile.profile_sidebar')
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    @include('shared.admin.layouts.user_profile.profile_edit_modal')
@endsection

@section('script')
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/apps/user-profile.js')}}"></script>
@endsection
