@extends('layouts.admin.admin')

@section('title', 'Danh sách sản phẩm')

@section('css')
    <style>
        span.product-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        @media only screen and (max-width: 600px) {
            span.product-name {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 150px;
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
                                <h3 class="nk-block-title page-title">Sản phẩm</h3>
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
                                                            <li><a href="{{request()->fullUrlWithQuery(['filter' => 'gia'])}}"><span>Giá</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nk-block-tools-opt">
                                                <a href="{{route('admin.product.create')}}"
                                                   class="btn btn-icon btn-primary d-md-none"><em
                                                        class="icon ni ni-plus"></em></a>
                                                <a href="{{route('admin.product.create')}}"
                                                   class="btn btn-primary d-none d-md-inline-flex"><em
                                                        class="icon ni ni-plus"></em><span>Thêm sản phẩm</span></a>
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
                                <div class="nk-tb-col"><span>Tên sản phẩm</span></div>
                                <div class="nk-tb-col"><span>Giá bán</span></div>
                                <div class="nk-tb-col tb-col-sm"><span>SL</span></div>
                                <div class="nk-tb-col tb-col-md"><span>Danh mục</span></div>
                                <div class="nk-tb-col tb-col-lg"><span>T.thái</span></div>
                                <div class="nk-tb-col tb-col-lg"><span>Sale</span></div>
                                <div class="nk-tb-col tb-col-lg"><span>View</span></div>
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

                            @foreach($products as $product)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" name="list_check[]" class="custom-control-input" id="{{$product->id}}">
                                            <label class="custom-control-label" for="{{$product->id}}"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                    <span class="tb-product">
                                        <img src="{{$product->thumbnail}}" alt="" class="thumb">
                                        <span class="title product-name">{{$product->name}}</span>
                                    </span>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span class="tb-lead">{{$product->price}}<em class="icon ni ni-sign-vnd"></em></span>
                                    </div>
                                    <div class="nk-tb-col tb-col-sm">
                                        <span class="tb-sub">{{$product->stock}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span class="tb-sub">{{$product->category->name}}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        @if($product->status == '1')
                                            <span class="tb-sub text-success">H.thị</span>
                                        @else
                                            <span class="tb-sub text-danger">Ẩn</span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        @if($product->sale == '1')
                                            <span class="tb-sub text-success">On</span>
                                        @else
                                            <span class="tb-sub text-danger">Off</span>
                                        @endif
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <span class="tb-sub">{{$product->view}}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.product.update_stock', $product->id)}}"
                                                   class="btn btn-trigger btn-icon"
                                                   data-toggle="modal" data-target="#update-stock-{{$product->id}}"
                                                   data-placement="top" title="Cập nhật SL">
                                                    <em class="icon ni ni-bar-c"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.product.update_price', $product->id)}}"
                                                   class="btn btn-trigger btn-icon"
                                                   data-toggle="modal" data-target="#update-price-{{$product->id}}"
                                                   data-placement="top" title="Cập nhật giá">
                                                    <em class="icon ni ni-invest"></em>
                                                </a>
                                            </li>
                                            <li class="nk-tb-action-hidden">
                                                <a href="{{route('admin.product.delete', $product->id)}}"
                                                   onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này khỏi hệ thống? Lưu ý, sau khi xóa sẽ không thể khôi phục!!')"
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
                                                            <li><a href="{{route('admin.product.edit', $product->id)}}"><em
                                                                        class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a>
                                                            </li>
                                                            <li><a href="#"><em class="icon ni ni-eye"></em><span>Xem sản phẩm</span></a>
                                                            </li>
                                                            <li><a href="{{route('admin.product.delete', $product->id)}}"
                                                                   onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này khỏi hệ thống? Lưu ý, sau khi xóa sẽ không thể khôi phục!!')">
                                                                    <em class="icon ni ni-trash"></em><span>Xóa sản phẩm</span></a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="#" data-toggle="modal" data-target="#update-stock-{{$product->id}}">
                                                                    <em class="icon ni ni-bar-c"></em><span>Cập nhật số lượng</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><em class="icon ni ni-invest"></em><span>Cập nhật giá bán</span></a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('admin.product_image.create', $product->id)}}">
                                                                    <em class="icon ni ni-img-fill"></em><span>Xem ảnh SP</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-tb-item -->
                                @include('shared.admin.layouts.product.form_update_stock')
                                @include('shared.admin.layouts.product.form_update_price')
                            @endforeach

                        </div><!-- .nk-tb-list -->
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        {!!$products->onEachSide(1)->withQueryString()->links()!!}
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
