@extends('layouts.admin.admin')

@section('title', 'Danh sách khuyến mại')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Danh sách khuyến mại</h3>
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
                                                               placeholder="Tìm kiến">
                                                    </form>
                                                </div>
                                            </li>

                                            <li class="nk-block-tools-opt">
                                                <a href="#" data-toggle="modal" data-target="#discount-create"
                                                   class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="#" data-toggle="modal" data-target="#discount-create"
                                                   class="btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Thêm mới</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
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
                    <div class="nk-block">
                        <div class="nk-tb-list is-separate mb-3">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" value="checkall" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Tên khuyến mại</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">% Giảm giá</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Từ ngày</span></div>
                                <div class="nk-tb-col"><span class="sub-text">Đến ngày</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1"
                                                   data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($discounts as $discount)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" value="list_check[]" class="custom-control-input"
                                                   id="{{$discount->id}}">
                                            <label class="custom-control-label" for="{{$discount->id}}"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-info">
                                                <span class="tb-lead">{{$discount->name}}</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <span>{{$discount->percent}}</span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="text-soft">
                                            {{ \Carbon\Carbon::parse($discount->from_date)->format('d M, Y') }}
                                        </span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="text-soft">
                                            {{ \Carbon\Carbon::parse($discount->to_date)->format('d M, Y') }}
                                        </span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.discount.edit', $discount->id)}}"
                                                   class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Chỉnh sửa">
                                                    <em class="icon ni ni-edit-fill"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.discount.delete', $discount->id)}}"
                                                   class="btn btn-trigger btn-icon"
                                                   data-toggle="tooltip"
                                                   onclick="return confirm('Bạn có chắc chắn xóa khuyến mại này khỏi hệ thống?')"
                                                   data-placement="top" title="Xóa">
                                                    <em class="icon ni ni-trash"></em>
                                                </a>
                                            </li>

                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="{{route('admin.discount.edit', $discount->id)}}">
                                                                    <em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.discount.delete', $discount->id)}}"
                                                                   onclick="return confirm('Bạn có chắc chắn xóa khuyến mại này khỏi hệ thống?')">
                                                                    <em class="icon ni ni-trash"></em><span>Xóa</span></a>
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
                                        {!!$discounts->onEachSide(1)->withQueryString()->links()!!}
                                    </div>
                                </div><!-- .nk-block-between -->
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    @include('shared.admin.layouts.discount.form_create')
@endsection
