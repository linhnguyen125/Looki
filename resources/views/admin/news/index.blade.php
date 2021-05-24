@extends('layouts.admin.admin')

@section('title', 'Danh sách tin tức')

@section('css')
    <style>
        span.product-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        @media only screen and (max-width: 576px) {
            span.product-name {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 250px;
            }
        }
        @media only screen and (max-width: 768px) {
            span.product-name {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 250px;
            }
        }

        @media only screen and (min-width: 768px) {
            span.product-name {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 500px;
            }
        }

        @media only screen and (min-width: 1080px) {
            span.product-name {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 70%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Tin tức</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                       data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
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
                                                        <input type="text" class="form-control" name="keyword"
                                                               value="{{request('keyword')}}" placeholder="Tìm kiến">
                                                    </form>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                       class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                       data-toggle="dropdown">T.thái</a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt">
                                                            <li><a href="{{request()->fullUrlWithQuery(['status' => 'hien-thi'])}}"><span>H.thị</span></a></li>
                                                            <li><a href="{{request()->fullUrlWithQuery(['status' => 'an'])}}"><span>Ẩn</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="drodown">
                                                    <a href="#"
                                                       class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                                       data-toggle="dropdown">Sắp xếp</a>
                                                    <div class="dropdown-menu">
                                                        <ul class="link-list-opt">
                                                            <li><a href="{{request()->fullUrlWithQuery(['filter' => 'view'])}}"><span>View</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="{{route('admin.news.create')}}"
                                                   class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="{{route('admin.news.create')}}"
                                                   class="btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Thêm tin</span></a>
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
                                        <input type="checkbox" name="check_all" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span>Tên news</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>Danh mục</span></div>
                                <div class="nk-tb-col tb-col-md"><span>T.thái</span></div>
                                <div class="nk-tb-col tb-col-md"><span>View</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li class="mr-n1">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                   data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-trash"></em><span>Xóa mục đã chọn</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .nk-tb-item -->

                            @foreach($newses as $news)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" name="list_check[]" class="custom-control-input" id="{{$news->id}}">
                                            <label class="custom-control-label" for="{{$news->id}}"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                    <span class="tb-product">
                                        <img src="{{$news->thumbnail}}" alt="" class="thumb">
                                        <span class="title product-name">{{$news->name}}</span>
                                    </span>
                                    </div>
                                    <div class="nk-tb-col tb-col-sm">
                                        <span class="tb-sub">{{$news->news_category->name}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        @if($news->status == '1')
                                            <span class="tb-sub text-success">H.thị</span>
                                        @else
                                            <span class="tb-sub text-danger">Ẩn</span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span class="tb-sub">{{$news->view}}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.news.edit', $news->id)}}"
                                                   class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Chỉnh sửa">
                                                    <em class="icon ni ni-edit"></em>
                                                </a>
                                            </li>

                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.news.delete', $news->id)}}"
                                                   onclick="return confirm('Bạn có chắc chắn xóa tin này khỏi hệ thống? Lưu ý, sau khi xóa sẽ không thể khôi phục!!')"
                                                   class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                   data-placement="top" title="Xóa">
                                                    <em class="icon ni ni-trash"></em>
                                                </a>
                                            </li>

                                            <li class="mr-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li>
                                                                <a href="{{route('admin.news.edit', $news->id)}}"><em
                                                                        class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><em class="icon ni ni-eye"></em><span>Xem tin</span></a>
                                                            </li>
                                                            <li><a href="{{route('admin.news.delete', $news->id)}}"
                                                                   onclick="return confirm('Bạn có chắc chắn xóa tin này khỏi hệ thống? Lưu ý, sau khi xóa sẽ không thể khôi phục!!')">
                                                                    <em class="icon ni ni-trash"></em><span>Xóa news</span></a>
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
                                        {!!$newses->onEachSide(1)->withQueryString()->links()!!}
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
