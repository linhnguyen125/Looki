@extends('layouts.admin.admin')

@section('title', 'Thêm mới blog')

@section('script')
    <script src="{{asset('bootstrap/js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/c2smjg6a8qpnm09rt8vnh82ycak6loc0rek9ik9f5s1a3kz5/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script src="{{asset('assets/admin/js/tinymce.js')}}"></script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
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
                                <h3 class="nk-block-title page-title">Thêm mới blog</h3>
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
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <form action="{{route('admin.blog.store')}}" method="POST">
                                                @csrf

                                                <div class="row gy-4">
                                                    <div class="row col-md-8">

                                                        <div class="col-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="name">Tên blog</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text"
                                                                           class="form-control @error('name') error @enderror"
                                                                           name="name" value="{{old('name')}}" id="name"
                                                                           placeholder="Tên blog">
                                                                </div>
                                                                @error('name')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="description">Mô tả ngắn </label>
                                                                    <strong
                                                                        class="text-info border border-info rounded-circle"
                                                                        data-toggle="tooltip"
                                                                        data-placement="top"
                                                                        title="Thể hiện tóm tắt blog cho khách hàng dễ quan sát">
                                                                        <em class="icon ni ni-info-i"></em></strong>
                                                                <div class="form-control-wrap">
                                                                    <textarea
                                                                        class="form-control @error('description') error @enderror form-control-sm"
                                                                        id="description"
                                                                        name="description"
                                                                        placeholder="Mô tả blog">{{old('description')}}</textarea>
                                                                </div>
                                                            </div>
                                                            @error('description')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="detail">Chi tiết blog</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea
                                                                        class="form-control @error('detail') error @enderror form-control-sm"
                                                                        id="detail"
                                                                        name="detail"
                                                                        placeholder="Chi tiết blog">{{old('detail')}}</textarea>
                                                                </div>
                                                            </div>
                                                            @error('detail')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="row col-md-4">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="category">Danh
                                                                    mục</label>
                                                                <select
                                                                    class="form-select @error('blog_category_id') error @enderror"
                                                                    name="blog_category_id" id="category">
                                                                    @foreach ($division_categories as $division_category)
                                                                        <option value="{{ $division_category->id }}"
                                                                            {{old('blog_category_id') == $division_category->id ? 'selected' : ''}}>
                                                                            {{ str_repeat('== ', $division_category->level) . $division_category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('blog_category_id')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="meta-keywords">Meta
                                                                    keywords</label> <strong
                                                                    class="text-info border border-info rounded-circle"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top"
                                                                    title="Nhiều từ cách nhau bởi dấu phẩy (,)">
                                                                    <em class="icon ni ni-info-i"></em></strong>
                                                                <div class="form-control-wrap">
                                                                    <input type="text"
                                                                           class="form-control @error('meta_keywords') error @enderror"
                                                                           name="meta_keywords"
                                                                           value="{{old('meta_keywords')}}"
                                                                           id="meta-keywords"
                                                                           placeholder="Meta keywords">
                                                                </div>
                                                                @error('meta_keywords')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="meta-description">Meta
                                                                    description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea
                                                                        class="form-control @error('meta_description') error @enderror form-control-sm"
                                                                        id="meta-description"
                                                                        name="meta_description"
                                                                        placeholder="Meta description">{{old('meta_description')}}</textarea>
                                                                </div>
                                                            </div>
                                                            @error('meta_description')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 p-1">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" name="status"
                                                                       {{old('status') ? 'checked' : ''}}
                                                                       class="custom-control-input" value="1"
                                                                       id="status">
                                                                <label class="custom-control-label" for="status">Hiển
                                                                    thị</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label d-block" for="thumbnail">Ảnh
                                                                    blog</label>
                                                                <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <a id="lfm" data-input="thumbnail"
                                                                               data-preview="holder"
                                                                               class="btn btn-success text-white">
                                                                                Choose
                                                                            </a>
                                                                        </span>
                                                                    <input id="thumbnail" class="form-control"
                                                                           type="text" name="thumbnail"
                                                                           value="{{$product->thumbnail ?? old('thumbnail')}}">
                                                                </div>
                                                            </div>
                                                            @error('thumbnail')
                                                            <strong>
                                                                <small
                                                                    class="text-danger mt-1">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                            <div id="holder"
                                                                 style="margin-top:15px;max-height:100px;">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 ml-2">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-lg btn-primary">
                                                                Thêm mới
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
