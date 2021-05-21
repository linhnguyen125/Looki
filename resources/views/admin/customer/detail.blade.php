@extends('layouts.admin.admin')

@section('title')
    {{$user->name}}
@endsection

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Khách hàng / <strong
                                        class="text-primary small">{{$user->name}}</strong></h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                        class="icon ni ni-arrow-left"></em><span>Trở về</span></a>
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                        class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#profile" class="nav-link active"><em
                                                    class="icon ni ni-user-circle"></em><span>Cá nhân</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#orders" class="nav-link"><em
                                                    class="icon ni ni-repeat"></em><span>Hóa đơn</span></a>
                                        </li>
                                        <li class="nav-item nav-item-trigger d-xxl-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em
                                                    class="icon ni ni-user-list-fill"></em></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="tab-content m-0 p-0">
                                        <!-- tab pane -->
                                        <div class="card-inner tab-pane active" id="profile">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Thông tin cá nhân</h5>
                                                    <p>Thông tin cơ bản, như tên và địa chỉ của khách hàng trên hệ
                                                        thống.</p>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Giới tính</span>
                                                            @if($user->gender == 'male')
                                                                <span class="profile-ud-value">
                                                                    Nam
                                                                </span>
                                                            @elseif($user->gender == 'female')
                                                                <span class="profile-ud-value">
                                                                    Nữ
                                                                </span>
                                                            @else
                                                                <span class="profile-ud-value">
                                                                    Nữ
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Họ và tên</span>
                                                            <span class="profile-ud-value">{{$user->name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Ngày sinh</span>
                                                            <span
                                                                class="profile-ud-value">{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d M, Y') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Tên</span>
                                                            <span class="profile-ud-value">
                                                                @php
                                                                    $str_name = explode(' ', $user->name);
                                                                    echo end($str_name);
                                                                @endphp
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Số điện thoại</span>
                                                            <span class="profile-ud-value">{{$user->phone}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ email</span>
                                                            <span class="profile-ud-value">{{$user->email}}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">Thông tin thêm</h6>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Ngày tham gia</span>
                                                            <span
                                                                class="profile-ud-value">{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y , H:m') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Hình thức đăng kí</span>
                                                            <span class="profile-ud-value">Email</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ</span>
                                                            @if($user->address)
                                                                <span class="profile-ud-value">
                                                                {{$user->address['province']}}, {{$user->address['district']}}, {{$user->address['ward']}} <br>
                                                                {{$user->address['more']}}
                                                            </span>
                                                            @else
                                                                <span class="profile-ud-value text-soft">
                                                                Chưa cập nhật
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Quốc tịch</span>
                                                            <span class="profile-ud-value">Việt Nam</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                        <!-- tab pane -->

                                        <!-- tab pane -->
                                        <div class="card-inner tab-pane" id="orders">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Thông tin hóa đơn</h5>
                                                    <p>Thông tin cơ bản, như tên và địa chỉ của khách hàng trên hệ
                                                        thống.</p>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Giới tính</span>
                                                            @if($user->gender == 'male')
                                                                <span class="profile-ud-value">
                                                                        Nam
                                                                    </span>
                                                            @elseif($user->gender == 'female')
                                                                <span class="profile-ud-value">
                                                                        Nữ
                                                                    </span>
                                                            @else
                                                                <span class="profile-ud-value">
                                                                        Nữ
                                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Họ và tên</span>
                                                            <span class="profile-ud-value">{{$user->name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Ngày sinh</span>
                                                            <span
                                                                class="profile-ud-value">{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d M, Y') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Tên</span>
                                                            <span class="profile-ud-value">
                                                                    @php
                                                                        $str_name = explode(' ', $user->name);
                                                                        echo end($str_name);
                                                                    @endphp
                                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Số điện thoại</span>
                                                            <span class="profile-ud-value">{{$user->phone}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ email</span>
                                                            <span class="profile-ud-value">{{$user->email}}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">Thông tin thêm</h6>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Ngày tham gia</span>
                                                            <span
                                                                class="profile-ud-value">{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y , H:m') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Hình thức đăng kí</span>
                                                            <span class="profile-ud-value">Email</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ</span>
                                                            @if($user->address)
                                                                <span class="profile-ud-value">
                                                                    {{$user->address['province']}}, {{$user->address['district']}}, {{$user->address['ward']}} <br>
                                                                    {{$user->address['more']}}
                                                                </span>
                                                            @else
                                                                <span class="profile-ud-value text-soft">
                                                                    Chưa cập nhật
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Quốc tịch</span>
                                                            <span class="profile-ud-value">Việt Nam</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                        <!-- tab pane -->
                                    </div>
                                    <div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl"
                                        data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true"
                                        data-toggle-body="true">
                                        <div class="card-inner-group" data-simplebar>
                                            <div class="card-inner">
                                                <div class="user-card user-card-s2">
                                                    <div class="user-avatar lg bg-primary">
                                                        @if($user->avatar)
                                                            <img
                                                                src="{{asset($user->avatar)}}"
                                                                alt="">
                                                        @else
                                                            <span>
                                                                @php
                                                                    $str_name = explode(' ', $user->name);
                                                                    if(count($str_name) > 1){
                                                                        echo strtoupper(reset($str_name)[0]) . strtoupper(end($str_name)[0]);
                                                                    }else{
                                                                        echo strtoupper(reset($str_name)[0]);
                                                                    }
                                                                @endphp
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="user-info">
                                                        <div class="badge badge-outline-light badge-pill ucap">Customer
                                                        </div>
                                                        <h5>{{$user->name}}</h5>
                                                        <span class="sub-text">{{$user->email}}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner card-inner-sm">
                                                <ul class="btn-toolbar justify-center gx-1">
                                                    <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                                class="icon ni ni-shield-off"></em></a></li>
                                                    <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                                class="icon ni ni-mail"></em></a></li>
                                                    <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                                class="icon ni ni-download-cloud"></em></a></li>
                                                    <li><a href="#" class="btn btn-trigger btn-icon"><em
                                                                class="icon ni ni-bookmark"></em></a></li>
                                                    <li><a href="#" class="btn btn-trigger btn-icon text-danger"><em
                                                                class="icon ni ni-na"></em></a></li>
                                                </ul>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="overline-title-alt mb-2">Đơn đặt hàng</div>
                                                <div class="profile-balance">
                                                    <div class="profile-balance-group gx-4">
                                                        <div class="profile-balance-sub">
                                                            <div class="profile-balance-amount">
                                                                <div class="number">2,556.57 <small
                                                                        class="currency currency-usd">USD</small></div>
                                                            </div>
                                                            <div class="profile-balance-subtitle">Hoàn thành đơn hàng</div>
                                                        </div>
                                                        <div class="profile-balance-sub">
                                                        <span class="profile-balance-plus text-soft"><em
                                                                class="icon ni ni-plus"></em></span>
                                                            <div class="profile-balance-amount">
                                                                <div class="number">1,143.76</div>
                                                            </div>
                                                            <div class="profile-balance-subtitle">Phát triển</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <div class="row text-center">
                                                    <div class="col-4">
                                                        <div class="profile-stats">
                                                            <span class="amount">23</span>
                                                            <span class="sub-text">Tổng đơn hàng</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="profile-stats">
                                                            <span class="amount">20</span>
                                                            <span class="sub-text">Hoàn thành</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="profile-stats">
                                                            <span class="amount">3</span>
                                                            <span class="sub-text">Đang vận chuyển</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <h6 class="overline-title-alt mb-2">Bổ sung</h6>
                                                <div class="row g-3">
                                                    <div class="col-6">
                                                        <span class="sub-text">User ID:</span>
                                                        <span>UD003054</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="sub-text">Đăng nhập cuối:</span>
                                                        <span>15 Jun, 2020 01:02 PM</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="sub-text">Xác thực email:</span>
                                                        <span class="lead-text text-success">Đã xác thực</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <span class="sub-text">Ngày đăng ký:</span>
                                                        <span>{{ \Carbon\Carbon::parse($user->created_at)->format('d M, Y') }}</span>
                                                    </div>
                                                </div>
                                            </div><!-- .card-inner -->
                                            <div class="card-inner">
                                                <h6 class="overline-title-alt mb-3">Groups</h6>
                                                <ul class="g-1">
                                                    <li class="btn-group">
                                                        <a class="btn btn-xs btn-light btn-dim" href="#">Customer</a>
                                                        <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                                class="icon ni ni-cross"></em></a>
                                                    </li>
                                                    <li class="btn-group">
                                                        <a class="btn btn-xs btn-light btn-dim" href="#">another tag</a>
                                                        <a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em
                                                                class="icon ni ni-cross"></em></a>
                                                    </li>
                                                </ul>
                                            </div><!-- .card-inner -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-aside -->
                                </div><!-- .card-aside-wrap -->
                            </div><!-- .card -->
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
