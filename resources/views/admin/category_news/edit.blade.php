@extends('layouts.admin.admin')

@section('title', 'Chỉnh sửa danh mục tin tức')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Chỉnh sửa danh mục tin tức</h3>
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
                                            <form id="form-edit" action="{{route('admin.category_news.update', $category->id)}}"
                                                  method="POST">
                                                @csrf

                                                <div class="row gy-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Tên danh
                                                                mục</label>
                                                            <input type="text" name="name"
                                                                   class="form-control @error('name') error @enderror"
                                                                   id="full-name"
                                                                   value="{{old('name') ? old('name') : $category->name}}" placeholder="Tên danh mục">
                                                        </div>
                                                        @error('name')
                                                        <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="parent-id">Danh mục
                                                                cha</label>
                                                            <select
                                                                class="form-select @error('parent_id') error @enderror"
                                                                id="parent-id"
                                                                name="parent_id" data-ui="md">
                                                                <option value="0">Danh mục gốc</option>
                                                                @foreach ($division_categories as $division_category)
                                                                    <option value="{{ $division_category->id }}"
                                                                        {{ old('parent_id') ? old('parent_id') : $category->parent_id == $division_category->id ? 'selected' : ''}}>
                                                                        {{ str_repeat('== ', $division_category->level) . $division_category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        @error('parent_id')
                                                        <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="form-label" for="description">Mô tả</label>
                                                            <div class="form-control-wrap">
                                                                <textarea class="form-control @error('description') error @enderror form-control-sm"
                                                                          id="description"
                                                                          name="description"
                                                                          placeholder="Mô tả danh mục">{{ old('description') ? old('description') : $category->description}}</textarea>
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
                                                        <a href="#" class="btn btn-lg btn-primary"
                                                           onclick="event.preventDefault();
                                                            document.getElementById('form-edit').submit();">
                                                            Cập nhật
                                                        </a>
                                                    </div>
                                                </div><!-- .tab-content -->
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
@endsection
