@extends('layouts.admin.admin')

@section('title', 'Thêm mới quản trị viên')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Thêm mới quản trị viên</h3>
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
                                            <form action="{{route('admin.user.store')}}" method="POST">
                                                @csrf

                                                <div class="row gy-4">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="name">Họ và tên</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text"
                                                                       class="form-control @error('name') error @enderror"
                                                                       name="name" value="{{old('name')}}" id="name"
                                                                       placeholder="Họ và tên">
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

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label" for="email">Email</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text"
                                                                       class="form-control @error('email') error @enderror"
                                                                       name="email" value="{{old('email')}}" id="email"
                                                                       placeholder="Địa chỉ email">
                                                            </div>
                                                            @error('email')
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
                                                            <label class="form-label" for="password">Mật khẩu</label>
                                                            <div class="form-control-wrap">
                                                                <input type="password"
                                                                       class="form-control @error('password') error @enderror"
                                                                       id="password" name="password"
                                                                       placeholder="Mật khẩu">
                                                            </div>
                                                            @error('password')
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
                                                            <label class="form-label" for="password-confirm">Xác nhận
                                                                mật khẩu</label>
                                                            <div class="form-control-wrap">
                                                                <input type="password"
                                                                       class="form-control @error('password') error @enderror"
                                                                       name="password_confirmation"
                                                                       id="password-confirm"
                                                                       placeholder="Xác nhận mật khẩu">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label for=" phone">Số điện thoại</label>
                                                            <div class="form-control-wrap">
                                                                <input type="text"
                                                                       class="form-control @error('phone') error @enderror""
                                                                name="phone" value="{{old('phone')}}" id="phone"
                                                                placeholder="Số điện thoại">
                                                            </div>
                                                            @error('phone')
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
                                                                <label class="form-label" for="date">Ngày sinh</label>
                                                                <input type="text"
                                                                       class="form-control @error('date_of_birth') error @enderror date-picker"
                                                                       name="date_of_birth" id="date"
                                                                       value="{{old('date_of_birth')}}"
                                                                       data-date-format="yyyy-mm-dd"
                                                                       placeholder="Ngày sinh">
                                                            </div>
                                                            @error('date_of_birth')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 d-flex">
                                                        <div class="form-group">
                                                            <div class="form-control-wrap">
                                                                <label class="form-label d-block" for="">Giới
                                                                    tính</label>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio">
                                                                    <input type="radio" id="male" name="gender"
                                                                           value="male"
                                                                           class="custom-control-input" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                                                    <label class="custom-control-label"
                                                                           for="male">Nam</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio ml-1">
                                                                    <input type="radio" id="female" name="gender"
                                                                           value="female"
                                                                           class="custom-control-input" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                                    <label class="custom-control-label"
                                                                           for="female">Nữ</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-control-sm custom-radio ml-1">
                                                                    <input type="radio" id="unknown" name="gender"
                                                                           value="unknown"
                                                                           class="custom-control-input" {{ old('gender') == 'unknown' ? 'checked' : '' }}>
                                                                    <label class="custom-control-label" for="unknown">Không
                                                                        xác định</label>
                                                                </div>
                                                                @error('gender')
                                                                <strong class="d-block">
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group mt-2">
                                                            <button type="submit" class="btn btn-lg btn-primary">Thêm
                                                                mới
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
