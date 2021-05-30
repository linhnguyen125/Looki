@extends('layouts.client.client')

@section('title')
    {{$user->name}}
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('assets/client/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/form.css')}}">
    <style>
        span.selection {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    @include('shared.client.account.breadcrumb')
    <div class="my-account pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title text-capitalize mb-30 pb-25">Tài Khoản</h3>
                </div>
                <!-- My Account Tab Menu Start -->
                <div class="col-lg-3 col-12 mb-30">
                    <div class="myaccount-tab-menu nav" role="tablist">
                        <a href="#orders" data-toggle="tab">
                            <i class="fa fa-cart-arrow-down"></i> Đơn hàng
                        </a>

                        <a href="#address-edit" data-toggle="tab">
                            <i class="fa fa-map-marker"></i> Địa chỉ</a>

                        <a href="#account-info" data-toggle="tab" class="active">
                            <i class="fa fa-user"></i> Chi tiết
                        </a>
                    </div>
                </div>
                <!-- My Account Tab Menu End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-9 col-12 mb-30">
                    <div class="tab-content" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Orders</h3>

                                <div class="myaccount-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mostarizing Oil</td>
                                            <td>Aug 22, 2018</td>
                                            <td>Pending</td>
                                            <td>$45</td>
                                            <td>
                                                <a href="shopping-cart.html" class="ht-btn black-btn">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Katopeno Altuni</td>
                                            <td>July 22, 2018</td>
                                            <td>Approved</td>
                                            <td>$100</td>
                                            <td>
                                                <a href="shopping-cart.html" class="ht-btn black-btn">View</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Murikhete Paris</td>
                                            <td>June 12, 2017</td>
                                            <td>On Hold</td>
                                            <td>$99</td>
                                            <td>
                                                <a href="shopping-cart.html" class="ht-btn black-btn">View</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Địa chỉ thanh toán</h3>

                                <address>
                                    <p><strong>{{$user->name}}</strong></p>
                                    <p>{{$user->address['province']}}</p>
                                    <p>{{$user->address['district']}}</p>
                                    <p>{{$user->address['ward']}}</p>
                                    <p>{{$user->address['more']}}</p>
                                    <p>Điện thoại: {{$user->phone}}</p>
                                </address>

                                <a
                                    href="{{route('client.account')}}"
                                    class="ht-btn black-btn d-inline-block edit-address-btn">
                                    <i class="fa fa-edit"></i>Edit Address
                                </a>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div
                            class="tab-pane fade active show"
                            id="account-info"
                            role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Thông tin chi tiết</h3>
                                <div class="account-details-form">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                    <form action="{{route('client.update_profile')}}" method="POST">
                                        @csrf

                                        <div class="row text-dark">
                                            <div class="col-lg-8 col-md-8 col-sm-12 mb-2">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email đăng ký</label>
                                                    <input type="email" id="email" value="{{$user->email}}"
                                                           placeholder="Email đăng nhập" disabled/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="form-label">Họ Tên</label>
                                                    <input type="text" id="name" name="name" value="{{old('name') ? old('name') : $user->name}}"
                                                           placeholder="Họ tên"/>
                                                    @error('name')
                                                        <small
                                                            class="text-danger">{{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="phone" class="form-label">Số điện thoại</label>
                                                    <input type="text" id="phone" name="phone" value="{{old('phone') ? old('phone') : $user->phone}}"
                                                           placeholder="Số điện thoại"/>
                                                    @error('phone')
                                                    <small
                                                        class="text-danger">{{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <input type="radio" id="male" name="gender" value="male"
                                                    @if(old('gender') == 'male')
                                                        {{'checked'}}
                                                    @elseif($user->gender == 'male')
                                                        {{'checked'}}
                                                    @endif
                                                        />
                                                    <label for="male" class="form-label mr-3">Nam</label>
                                                    <input type="radio" id="female" name="gender" value="female"
                                                    @if(old('gender') == 'female')
                                                        {{'checked'}}
                                                        @elseif($user->gender == 'female')
                                                        {{'checked'}}
                                                        @endif
                                                    />
                                                    <label for="female" class="form-label">Nữ</label>
                                                    @error('gender')
                                                    <div>
                                                        <small
                                                            class="text-danger">{{ $message }}
                                                        </small>
                                                    </div>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="date_of_birth" class="form-label">Ngày sinh</label>
                                                    <input type="text" class="form-control date-picker"
                                                           name="date_of_birth" id="date_of_birth"
                                                           value="{{old('date_of_birth') ? old('date_of_birth') : $user->date_of_birth}}"
                                                           data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"
                                                           autocomplete="true">
                                                    @error('date_of_birth')
                                                        <small
                                                            class="text-danger">{{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                                <div class="form-group">
                                                    <label class="form-label" for="province">Tỉnh/Thành phố</label>
                                                    <select class="form-select @error('province') error @enderror"
                                                            id="province"
                                                            data-search="on" name="province" data-ui="lg">
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}"
                                                                    @if(old('province') == $province->id)
                                                                        {{'selected'}}
                                                                    @elseif($user->address['province'] == $province->name)
                                                                        {{'selected'}}
                                                                    @endif
                                                                    >
                                                                {{ $province->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('province')
                                                <strong>
                                                    <small
                                                        class="text-danger">{{ $message }}
                                                    </small>
                                                </strong>
                                                @enderror

                                                <div class="form-group">
                                                    <label class="form-label" for="district">Quận/Huyện</label>
                                                    <select class="form-select @error('district') error @enderror"
                                                            id="district"
                                                            data-search="on" name="district" data-ui="lg">
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}"
                                                                @if(old('district') == $district->id)
                                                                {{'selected'}}
                                                                @elseif($user->address['district'] == $district->name)
                                                                {{'selected'}}
                                                                @endif
                                                            >
                                                                {{ $district->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('district')
                                                <strong>
                                                    <small
                                                        class="text-danger">{{ $message }}
                                                    </small>
                                                </strong>
                                                @enderror

                                                <div class="form-group">
                                                    <label class="form-label" for="ward">Phường/Thị xã</label>
                                                    <select class="form-select @error('ward') error @enderror"
                                                            id="ward"
                                                            data-search="on" name="ward" data-ui="lg">
                                                        @foreach ($wards as $ward)
                                                            <option value="{{ $ward->id }}"
                                                                @if(old('ward') == $ward->id)
                                                                {{'selected'}}
                                                                @elseif($user->address['ward'] == $ward->name)
                                                                {{'selected'}}
                                                                @endif
                                                            >
                                                                {{ $ward->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('ward')
                                                <strong>
                                                    <small
                                                        class="text-danger">{{ $message }}
                                                    </small>
                                                </strong>
                                                @enderror

                                                <div class="form-group">
                                                    <label for="more" class="form-label">Địa chỉ nhà riêng</label>
                                                    <input type="text" id="more" name="more" value="{{old('more') ? old('more') : $user->address['more']}}"
                                                           placeholder="Địa chỉ nhà riêng"/>
                                                    @error('more')
                                                    <small
                                                        class="text-danger">{{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <input type="hidden" id="updateDistrict"
                                                   value="{{route('update.district')}}">
                                            <input type="hidden" id="updateWard" value="{{route('update.ward')}}">

                                            <div class="col-12 mt-2">
                                                <button class="btn btn-dark btn--md">Thay Đổi</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                    </div>
                </div>
                <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('assets/admin/js/bundle.js?ver=2.2.0')}}"></script>
    <script src="{{asset('assets/admin/js/scripts.js?ver=2.2.0')}}"></script>
    <script src="{{asset('assets/admin/js/apps/user-profile.js')}}"></script>
@endsection
