@extends('layouts.auth.auth')

@section('title',  'Thay đổi mật khẩu')

@section('content')
    <div class="col-lg-6 col-12 fxt-bg-color">
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Thay đổi mật khẩu</h2>
                <p>Thay đổi mật khẩu của bạn</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email" class="input-label">Địa Chỉ Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ $email ?? old('email') }}" name="email" placeholder="Email" required="required">
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
                        <button type="submit" class="fxt-btn-fill">Đồng ý</button>
                    </div>
                </form>
            </div>
            <div class="fxt-footer">
                <p>Quay lại đăng nhập<a href="{{route('login')}}" class="switcher-text2 inline-text">Đăng nhập</a></p>
            </div>
        </div>
    </div>
@endsection


