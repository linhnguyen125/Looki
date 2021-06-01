@extends('layouts.admin.admin')

@section('title', 'Danh sách hóa đơn')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Hóa đơn</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                       data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="more-options">
                                        <ul class="nk-block-tools g-3">
                                            <li>
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <a href="#"
                                                           onclick="event.preventDefault();
                                                            document.getElementById('search-form').submit();">
                                                            <em class="icon ni ni-search"></em>
                                                        </a>
                                                    </div>
                                                    <form id="search-form" action="">
                                                        <input type="text" class="form-control" name="keywords"
                                                               value="{{request('keywords')}}" placeholder="Tìm kiến">
                                                    </form>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                       class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                       data-toggle="dropdown">Trạng thái</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt">
                                                            <li>
                                                                <a href="{{request()->fullUrlWithQuery(['status' => 'hoan-thanh'])}}"><span>Hoàn thành</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{request()->fullUrlWithQuery(['status' => 'dang-xu-ly'])}}"><span>Đang xử lý</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{request()->fullUrlWithQuery(['status' => 'dang-giao'])}}"><span>Đang giao</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{request()->fullUrlWithQuery(['status' => 'da-huy'])}}"><span>Đã hủy</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    @include('shared.admin.layouts.alert')
                    <div class="nk-block">
                        <div class="nk-tb-list is-separate mb-3">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" value="checkall" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Mã hóa đơn</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Khách hàng</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Thành tiền</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Trạng thái</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1"
                                                   data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li>
                                                            <a href="#"><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($orders as $order)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" value="list_check[]" class="custom-control-input"
                                                   id="{{$order->id}}">
                                            <label class="custom-control-label" for="{{$order->id}}"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <a href="{{route('admin.order.detail', $order->id)}}">
                                            <div class="user-card">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{$order->order_code}} <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>{{ \Carbon\Carbon::parse($order->created_at)->format('d M, Y') }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{$order->user->name}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{$order->total}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        @if($order->status == 'processing')
                                            <span class="text-warning">
                                                Đang xử lý
                                            </span>
                                        @elseif($order->status == 'fail')
                                            <span class="text-danger">
                                                Đã hủy
                                            </span>
                                        @elseif($order->status == 'success')
                                            <span class="text-success">
                                                Hoàn thành
                                            </span>
                                        @else
                                            <span class="text-primary">
                                                Đang giao
                                            </span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.order.delete', $order->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Xóa">
                                                    <em class="icon ni ni-trash-fill"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.order.detail', $order->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Chi tiết">
                                                    <em class="icon ni ni-eye-fill"></em>
                                                </a>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="{{route('admin.order.detail', $order->id)}}"><em
                                                                        class="icon ni ni-eye"></em><span>Xem chi tiết</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.order.delete', $order->id)}}">
                                                                    <em class="icon ni ni-trash-fill"></em><span>Xóa</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-tb-item -->
                            @endforeach
                        </div><!-- .nk-tb-list -->
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        {!!$orders->onEachSide(1)->withQueryString()->links()!!}
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
