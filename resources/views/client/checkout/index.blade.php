@extends('layouts.client.client')

@section('title', 'Thanh Toán')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/client/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/client/css/form.css')}}">
    <style>
        span.selection {
            width: 100% !important;
        }

        @media only screen and (min-width: 991px) {
            span.order-middle-left{
                white-space: initial;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 260px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- breadcrumb-section start -->
    @include('shared.client.checkout.breadcrumb')
    <!-- breadcrumb-section end -->

    <!-- checkout area start -->
    <div class="check-out-section pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-info-wrap">
                        <h3 class="title">Chi Tiết Thanh Toán</h3>
                        <form class="personal-information" id="order-form" action="{{route('client.checkout.order')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="billing-info mb-20px">
                                        <label>Địa Chỉ Email</label>
                                        <input type="email" name="email" value="{{$user->email}}" disabled/>
                                        @error('email')
                                        <strong>
                                            <small
                                                class="text-danger">{{ $message }}
                                            </small>
                                        </strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label>Tên Của Bạn</label>
                                        <input type="text" name="name"
                                               value="{{$user->name}}" disabled/>
                                        @error('name')
                                        <strong>
                                            <small
                                                class="text-danger">{{ $message }}
                                            </small>
                                        </strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-20px">
                                        <label for="phone">Số Điện Thoại</label>
                                        <input type="text" id="phone" name="phone"
                                               value="{{old('phone') ? old('phone') : $user->phone}}"/>
                                        @error('phone')
                                        <strong>
                                            <small
                                                class="text-danger">{{ $message }}
                                            </small>
                                        </strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="billing-info mb-20px">
                                        <label for="province">Tỉnh/Thành phố</label>
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
                                    </div>
                                    @error('province')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="billing-info mb-20px">
                                        <label for="district">Quận/Huyện</label>
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
                                    </div>
                                    @error('district')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="billing-info mb-20px">
                                        <label for="ward">Phường/Thị xã</label>
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
                                    </div>
                                    @error('ward')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-info mb-20px">
                                        <label for="more">Địa Chỉ Nhà Riêng</label>
                                        <input type="text" id="more" name="more"
                                               value="{{old('more') ? old('more') : $user->address['more']}}"/>
                                        @error('more')
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 additional-info-wrap">
                                    <h4 class="title">Thông tin thêm</h4>
                                    <div class="additional-info">
                                        <textarea placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: những lưu ý đặc biệt khi giao hàng." name="note">{{old('note')}}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" id="updateDistrict"
                                       value="{{route('update.district')}}">
                                <input type="hidden" id="updateWard" value="{{route('update.ward')}}">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mt-4 mt-lg-0">
                    <div class="your-order-area">
                        <h3 class="title">Đơn Hàng</h3>
                        <div class="your-order-wrap gray-bg-4">
                            <div class="your-order-product-info">
                                <div class="your-order-top">
                                    <ul>
                                        <li>Sản Phẩm</li>
                                        <li>Thành Tiền</li>
                                    </ul>
                                </div>
                                <div class="your-order-middle">
                                    <ul>
                                        @foreach(Cart::content() as $item)
                                            <li>
                                                <span class="order-middle-left">{{$item->name}} X {{$item->qty}}</span>
                                                <span class="order-price">{{number_format($item->subtotal, 0, '', ',')}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="your-order-bottom">
                                    <ul>
                                        <li class="your-order-shipping">Phí giao hàng</li>
                                        <li>Free shipping</li>
                                    </ul>
                                </div>
                                <div class="your-order-total">
                                    <ul>
                                        <li class="order-total">Tổng Thanh Toán</li>
                                        <li>{{Cart::total()}} đ</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion element-mrg">
                                    <div class="panel-group" id="accordion">
                                        <div class="panel payment-accordion">
                                            <div class="panel-heading" id="method-three">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method3">
                                                        Thanh toán khi nhận hàng
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="method3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>
                                                        Vui lòng kiểm tra hàng trước khi thành toán
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Place-order mt-25">
                            <a class="btn btn--xl btn-block btn-primary" href="javascript:void(0)"
                               onclick="event.preventDefault();
                               document.getElementById('order-form').submit();">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout area end -->
@endsection

@section('script')
    <script src="{{asset('assets/admin/js/bundle.js?ver=2.2.0')}}"></script>
    <script src="{{asset('assets/admin/js/scripts.js?ver=2.2.0')}}"></script>
    <script src="{{asset('assets/admin/js/apps/user-profile.js')}}"></script>
@endsection
