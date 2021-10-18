@extends('layouts.admin.admin')

@section('title', 'Ảnh sản phẩm')

@section('script')
    <script src="{{asset('bootstrap/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $('#lfm').filemanager('Image');
    </script>
@endsection

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">
                                    Ảnh Sản Phẩm
                                </h3>
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
                    @include('shared.admin.layouts.alert')
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#all" class="nav-link active">
                                                <em class="icon ni ni-img"></em><span>Tất cả ảnh</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#form-create" class="nav-link">
                                                <em class="icon ni ni-plus-circle"></em><span>Thêm ảnh</span></a>
                                        </li>
                                    </ul><!-- .nav-tabs -->
                                    <div class="tab-content">

                                        <!-- tab pane -->
                                        <div class="card-inner tab-pane active" id="all">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Ảnh sản phẩm</h5>
                                                    <p>{{$product->name}}</p>
                                                </div><!-- .nk-block-head -->

                                                    <div class="nk-tb-list is-separate mb-3">
                                                        <div class="nk-tb-item nk-tb-head">
                                                            <div class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" name="check_all" class="custom-control-input" id="uid">
                                                                    <label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </div>
                                                            <div class="nk-tb-col"><span>Ảnh</span></div>
                                                            <div class="nk-tb-col"><span>Ngày tạo</span></div>
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

                                                        @foreach($images as $image)
                                                            <div class="nk-tb-item">
                                                                <div class="nk-tb-col nk-tb-col-check">
                                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                        <input type="checkbox" name="list_check[]" class="custom-control-input" id="{{$image->id}}">
                                                                        <label class="custom-control-label" for="{{$image->id}}"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                    <a href="{{$image->path}}" target="_blank">
                                                                        <span class="tb-product">
                                                                            <img src="{{$image->path}}" alt="" class="thumb">
                                                                        </span>
                                                                    </a>
                                                                </div>
                                                                <div class="nk-tb-col">
                                                                    <span class="tb-lead">{{ \Carbon\Carbon::parse($image->created_at)->format('d M, Y') }}</span>
                                                                </div>
                                                                <div class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                                        <li class="nk-tb-action-hidden">
                                                                            <a href="#"
                                                                               class="btn btn-trigger btn-icon" data-toggle="tooltip"
                                                                               data-placement="top" title="Chỉnh sửa">
                                                                                <em class="icon ni ni-edit"></em>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nk-tb-action-hidden">
                                                                            <a href="{{route('admin.product_image.delete', $image->id)}}"
                                                                               onclick="return confirm('Bạn có chắc chắn xóa ảnh này? Lưu ý, sau khi xóa sẽ không thể khôi phục!!')"
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
                                                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Chỉnh sửa</span></a>
                                                                                        </li>
                                                                                        <li><a href="{{route('admin.product_image.delete', $image->id)}}"
                                                                                               onclick="return confirm('Bạn có chắc chắn xóa ảnh này? Lưu ý, sau khi xóa sẽ không thể khôi phục!!')">
                                                                                                <em class="icon ni ni-trash"></em><span>Xóa ảnh</span></a>
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
                                                                    {!!$images->onEachSide(1)->withQueryString()->links()!!}
                                                                </div>
                                                            </div><!-- .nk-block-between -->
                                                        </div>
                                                    </div>
                                                </div><!-- .nk-block -->

                                            <div class="nk-divider divider md"></div>
                                        </div><!-- .card-inner -->
                                        <!-- tab pane -->

                                        <!-- tab pane -->
                                        <div class="card-inner tab-pane" id="form-create">
                                            <div class="nk-block">
                                                <div class="nk-block-head">
                                                    <h5 class="title">Thêm ảnh cho sản phẩm</h5>
                                                    <p>{{$product->name}}</p>
                                                </div><!-- .nk-block-head -->
                                                <div class="nk-block-head">
                                                    <form action="{{route('admin.product_image.store', $product->id)}}"
                                                          method="POST">
                                                        @csrf
                                                        <div class="row gy-4">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="form-label d-block" for="thumbnail">Chọn
                                                                        ảnh</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <a id="lfm" data-input="thumbnail"
                                                                               data-preview="holder"
                                                                               class="btn btn-success text-white">
                                                                                Choose
                                                                            </a>
                                                                        </span>
                                                                        <input id="thumbnail" class="form-control"
                                                                               type="text" name="path"
                                                                               value="{{old('path')}}">
                                                                    </div>
                                                                </div>
                                                                @error('path')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger mt-1">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                                <div id="holder"
                                                                     style="margin-top:15px;max-height:300px;">
                                                                </div>
                                                            </div>

                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                            class="btn btn-md btn-primary">
                                                                        Thêm mới
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- .nk-block -->
                                            <div class="nk-divider divider md"></div>
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
@endsection
