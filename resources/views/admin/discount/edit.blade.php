@extends('layouts.admin.admin')

@section('title', 'Chỉnh sửa khuyến mại')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Chỉnh sửa khuyến mại</h3>
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
                                            <form id="form-edit"
                                                  action="{{route('admin.discount.update', $discount->id)}}"
                                                  method="POST">
                                                @csrf

                                                <div class="row gy-4">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="full-name">Tên khuyến
                                                                mại</label>
                                                            <input type="text" name="name"
                                                                   class="form-control @error('name') error @enderror"
                                                                   id="full-name"
                                                                   value="{{old('name') ? old('name') : $discount->name}}"
                                                                   placeholder="Tên khuyến mại">
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
                                                            <label class="form-label" for="percent">% Giảm giá</label>
                                                            <input type="text" name="percent"
                                                                   class="form-control @error('percent') error @enderror"
                                                                   id="percent"
                                                                   value="{{old('percent') ? old('percent') : $discount->percent}}"
                                                                   placeholder="% Giảm giá">
                                                        </div>
                                                        @error('percent')
                                                        <strong>
                                                            <small
                                                                class="text-danger">{{ $message }}
                                                            </small>
                                                        </strong>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="from-date">Từ
                                                                    ngày</label>
                                                                <input type="text"
                                                                       class="form-control @error('from_date') error @enderror date-picker"
                                                                       name="from_date" id="from-date"
                                                                       value="{{old('from_date') ? old('from_date') : \Carbon\Carbon::parse($discount->from_date)->format('Y-m-d')}}"
                                                                       data-date-format="yyyy-mm-dd"
                                                                       placeholder="yyyy-mm-dd">
                                                            </div>
                                                            @error('from_date')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label" for="to-date">Đến ngày</label>
                                                                <input type="text"
                                                                       class="form-control @error('to_date') error @enderror date-picker"
                                                                       name="to_date" id="to-date"
                                                                       value="{{old('to_date') ? old('to_date') : \Carbon\Carbon::parse($discount->to_date)->format('Y-m-d')}}"
                                                                       data-date-format="yyyy-mm-dd"
                                                                       placeholder="yyyy-mm-dd">
                                                            </div>
                                                            @error('to_date')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>
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
