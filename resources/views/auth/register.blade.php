@extends('layouts.auth.auth')

@section('title',  'Đăng Ký')

@section('content')
    <div class="col-lg-6 col-12 fxt-bg-color">
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Đăng ký</h2>
                <p>Tạo tài khoản cá nhân</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="input-label">Họ Và Tên</label>
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" name="name" placeholder="Họ và tên" required="required">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="input-label">Địa Chỉ Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" name="email" placeholder="Địa chỉ email" required="required">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="input-label">Mật khẩu</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="********" required="required">
                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="input-label">Xác Nhận Mật Khẩu</label>
                        <input id="re-password" type="password" class="form-control" name="password_confirmation" placeholder="********" required="required">
                        <i toggle="#re-password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="fxt-btn-fill">Đăng Ký</button>
                    </div>
                </form>
            </div>
            <div class="fxt-footer">
                <p>Nếu bạn đã có tài khoản?<a href="{{route('login')}}" class="switcher-text2 inline-text">Đăng nhập</a></p>
            </div>
        </div>
    </div>
@endsection
