@extends('layouts.admin.admin')

@section('title')
    {{$order->order_code}}
@endsection

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Hóa Đơn / <strong
                                        class="text-primary small">{{$order->order_code}}</strong></h3>
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
                                            <a data-toggle="tab" href="#profile" class="nav-link"><em
                                                    class="icon ni ni-user-circle"></em><span>Thông tin</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#orders" class="nav-link active"><em
                                                    class="icon ni ni-repeat"></em><span>Chi tiết</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="tab-content m-0 p-0">
                                        <!-- tab pane -->
                                        <div class="card-inner tab-pane fade" id="profile">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-8">
                                                            <h5 class="title">Thông tin đơn hàng và khách hàng</h5>
                                                            <p>Thông tin cơ bản, như tên và địa chỉ giao hàng</p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4">
                                                            <form>
                                                                @csrf
                                                                <input type="hidden" name="url" value="{{route('admin.order.change_status')}}" data-id="{{$order->id}}">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="status">Trạng thái đơn hàng</label>
                                                                    <select class="form-select" name="status" id="status">
                                                                        <option value="processing" @if($order->status == 'processing') {{'selected'}} @endif>Đang xử lý</option>
                                                                        <option value="in transit" @if($order->status == 'in transit') {{'selected'}} @endif>Đang vận chuyển</option>
                                                                        <option value="success" @if($order->status == 'success') {{'selected'}} @endif>Hoàn thành</option>
                                                                        <option value="fail" @if($order->status == 'fail') {{'selected'}} @endif>Đã hủy</option>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ email</span>
                                                            <span
                                                                class="profile-ud-value">{{$order->user->email}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Họ và tên</span>
                                                            <span class="profile-ud-value">{{$order->user->name}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Số điện thoại</span>
                                                            <span
                                                                class="profile-ud-value">{{$order->user->phone}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Ngày đặt hàng</span>
                                                            <span
                                                                class="profile-ud-value">{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</span>
                                                        </div>
                                                    </div>
                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-block">
                                                <div class="nk-block-head nk-block-head-line">
                                                    <h6 class="title overline-title text-base">Thông tin giao hàng</h6>
                                                </div><!-- .nk-block-head -->
                                                <div class="profile-ud-list">
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Địa chỉ nhận hàng</span>
                                                            <span class="profile-ud-value">
{{--                                                                {{$order->address['more']}} - {{$order->address['ward']}}--}}
{{--                                                                - {{$order->address['district']}} - {{$order->address['province']}}--}}
                                                                {{$order->address}}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="profile-ud-item">
                                                        <div class="profile-ud wider">
                                                            <span class="profile-ud-label">Lưu ý</span>
{{--                                                            @if($order->address['note'] != null)--}}
{{--                                                                <span--}}
{{--                                                                    class="profile-ud-value">{{$order->address['note']}}</span>--}}
{{--                                                            @else--}}
{{--                                                                <span class="profile-ud-value">Không có</span>--}}
{{--                                                            @endif--}}
                                                            Không có
                                                        </div>
                                                    </div>

                                                </div><!-- .profile-ud-list -->
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                        <!-- tab pane -->

                                        <!-- tab pane -->
                                        <div class="card-inner tab-pane show fade active" id="orders">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Chi tiết hóa đơn</h5>
                                                    <p>Chi tiết hóa đơn</p>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-tb-list is-separate mb-3 text-left">
                                                    <div class="nk-tb-item nk-tb-head">
                                                        <div class="nk-tb-col">
                                                            <span class="sub-text">Sản phẩm</span>
                                                        </div>
                                                        <div class="nk-tb-col tb-col-md"><span
                                                                class="sub-text">Đơn giá</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span
                                                                class="sub-text">Số lượng</span></div>
                                                        <div class="nk-tb-col tb-col-md"><span
                                                                class="sub-text">Giảm giá</span></div>
                                                        <div class="nk-tb-col tb-col-lg">
                                                            <span class="sub-text">Thành tiền</span>
                                                        </div>
                                                    </div>
                                                    @foreach($details as $detail)
                                                        <div class="nk-tb-item">
                                                            <div class="nk-tb-col">
                                                                    <span class="tb-product">
                                                                        <img src="{{$detail->product->thumbnail}}"
                                                                             alt="" class="thumb">
                                                                        <span
                                                                            class="title product-name">{{$detail->product->name}}</span>
                                                                    </span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{number_format($detail->product->price, 0, '', ',')}}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{$detail->qty}}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-md">
                                                                <span>{{$detail->discount}}</span>
                                                            </div>
                                                            <div class="nk-tb-col tb-col-lg">
                                                                <span>{{number_format(($detail->product->price - ($detail->product->price * $detail->discount)/100 ) * $detail->qty, 0, '', ',')}}</span>
                                                            </div>
                                                        </div><!-- .nk-tb-item -->
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="nk-divider divider md"></div>
                                            <div class="float-right pb-4 pr-4">
                                                <span style="font-size: 16px; font-weight: bold; color: #364a63">Tổng Hóa Đơn: {{number_format($order->total, 0, '', ',')}} VND</span>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <!-- tab pane -->
                                    </div>
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

@section('script')
    <script src="{{asset('assets/admin/js/apps/order.js')}}"></script>
@endsection
