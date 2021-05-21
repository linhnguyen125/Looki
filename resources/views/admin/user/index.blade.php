@extends('layouts.admin.admin')

@section('title', 'Danh sách quản trị viên')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Quản trị viên</h3>
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
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                       class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                       data-toggle="dropdown">Trạng thái</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="{{request()->fullUrlWithQuery(['status' => 'hoat-dong'])}}"><span>Hoạt động</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{request()->fullUrlWithQuery(['status' => 'bi-chan'])}}"><span>Bị chặn</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="{{route('admin.user.create')}}"
                                                   class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="{{route('admin.user.create')}}"
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
                    <div class="nk-block">
                        <div class="nk-tb-list is-separate mb-3">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" value="checkall" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Quản trị viên</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Điện thoại</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Địa chỉ</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Ngày sinh</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Trạng thái</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1"
                                                   data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-mail"></em><span>Send Email to All</span></a>
                                                        </li>
                                                        <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend Selected</span></a>
                                                        </li>
                                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Seleted</span></a>
                                                        </li>
                                                        <li><a href="#"><em class="icon ni ni-shield-star"></em><span>Reset Password</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->
                            @foreach($admins as $admin)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" value="list_check[]" class="custom-control-input"
                                                   id="{{$admin->id}}">
                                            <label class="custom-control-label" for="{{$admin->id}}"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <a href="{{route('admin.user.detail', $admin->id)}}">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    @if($admin->avatar)
                                                        <img
                                                            src="{{asset($admin->avatar)}}"
                                                            alt="">
                                                    @else
                                                        <span>
                                                            @php
                                                                $str_name = explode(' ', $admin->name);
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
                                                    <span class="tb-lead">{{$admin->name}} <span
                                                            class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>{{$admin->email}}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{$admin->phone}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        @if($admin->address)
                                            <span>
                                                {{$admin->address['province']}}, {{$admin->address['district']}}, {{$admin->address['ward']}} <br>
                                                {{$admin->address['more']}}
                                            </span>
                                        @else
                                            <span class="text-soft">
                                                Chưa cập nhật
                                            </span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <span>{{ \Carbon\Carbon::parse($admin->date_of_birth)->format('d M, Y') }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        @if($admin->status == '1')
                                            <span class="tb-status text-success">Hoạt động</span>
                                        @else
                                            <span class="tb-status text-danger">Bị chặn</span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Send Email">
                                                    <em class="icon ni ni-mail-fill"></em>
                                                </a>
                                            </li>
                                            @if(Auth::guard('admin')->user()->id != $admin->id)
                                                <li class="nk-tb-action-hidden">
                                                    @if($admin->status == '1')
                                                        <a href="{{route('admin.user.suspend', $admin->id)}}"
                                                           class="btn btn-trigger btn-icon"
                                                           data-toggle="tooltip"
                                                           data-placement="top" title="Chặn">
                                                            <em class="icon ni ni-user-cross-fill"></em>
                                                        </a>
                                                    @else
                                                        <a href="{{route('admin.user.active', $admin->id)}}"
                                                           class="btn btn-trigger btn-icon"
                                                           data-toggle="tooltip"
                                                           data-placement="top" title="Active">
                                                            <em class="icon ni ni-user-check-fill"></em>
                                                        </a>
                                                    @endif
                                                </li>
                                            @endif
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="{{route('admin.user.detail', $admin->id)}}"><em
                                                                        class="icon ni ni-eye"></em><span>Xem chi tiết</span></a>
                                                            </li>
                                                            @if(Auth::guard('admin')->user()->id != $admin->id)
                                                                <li class="nk-tb-action-hidden">
                                                                @if($admin->status == '1')
                                                                    <li>
                                                                        <a href="{{route('admin.user.suspend', $admin->id)}}">
                                                                            <em class="icon ni ni-na"></em><span>Chặn</span></a>
                                                                    </li>
                                                                @else
                                                                    <li>
                                                                        <a href="{{route('admin.user.active', $admin->id)}}">
                                                                            <em class="icon ni ni-check-circle"></em><span>Active</span></a>
                                                                    </li>
                                                                    @endif
                                                                    </li>
                                                                @endif
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
                                        {!!$admins->onEachSide(1)->withQueryString()->links()!!}
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
