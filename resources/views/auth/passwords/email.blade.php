@extends('layouts.auth.auth')

@section('title',  'Quên mật khẩu')

@section('content')
    <div class="col-lg-6 col-12 fxt-bg-color">
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Quên mật khẩu</h2>
                <p>Khôi phục lại mật khẩu của bạn</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="input-label">Địa Chỉ Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" name="email" placeholder="Email" required="required">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="fxt-btn-fill">Gửi Email Cho Tôi</button>
                    </div>
                </form>
            </div>
            <div class="fxt-footer">
                <p>Quay lại đăng nhập<a href="{{route('login')}}" class="switcher-text2 inline-text">Đăng nhập</a></p>
            </div>
        </div>
    </div>
@endsection

