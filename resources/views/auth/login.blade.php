@extends('layouts.auth.auth')

@section('title',  'Đăng nhập')

@section('content')
    <div class="col-lg-6 col-12 fxt-bg-color">
        <div class="fxt-content">
            <div class="fxt-form">
                <h2>Đăng nhập</h2>
                <p>Đăng nhập bằng tài khoản cá nhân</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="input-label">Địa Chỉ Email</label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required="required">
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
                        <div class="fxt-checkbox-area">
                            <div class="checkbox">
                                <input id="checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox">Duy trì đăng nhập</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="switcher-text">
                                    Quên mật khẩu?
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="fxt-btn-fill">Đăng Nhập</button>
                    </div>
                </form>
            </div>
            <div class="fxt-style-line">
                <h3>Hoặc đăng nhập bằng</h3>
            </div>
            <ul class="fxt-socials">
                <li class="fxt-twitter"><a href="{{ route('redirect', 'facebook') }}" title="twitter">Facebook</a></li>
                <li class="fxt-google"><a href="{{ route('redirect', 'google') }}" title="google">Google +</a></li>
                <li class="fxt-facebook"><a href="#" title="Facebook">Twitter</a></li>
            </ul>
            <div class="fxt-footer">
                <p>Bạn chưa có tài khoản?<a href="{{route('register')}}" class="switcher-text2 inline-text">Đăng ký</a></p>
            </div>
        </div>
    </div>
@endsection
