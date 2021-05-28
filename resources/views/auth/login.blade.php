@extends('layouts.client.client')

@section('title', 'Đăng nhập / Đăng ký')

@section('content')
    <!-- login area start -->
    <div class="login-register-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" href="{{route('login')}}">
                                <h4>Đăng nhập</h4>
                            </a>
                            <a href="{{route('register')}}">
                                <h4>Đăng ký</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="input-group has-validation mb-30">
                                                <input id="email" type="email" class="mb-1 form-control @error('email') is-invalid @enderror" name="email"
                                                       value="{{ old('email') }}" placeholder="Địa chỉ email" autofocus required autocomplete="email">

                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="input-group has-validation mb-10">
                                                <input id="password" type="password" class="mb-1 form-control @error('password') is-invalid @enderror" name="password"
                                                       placeholder="Mật khẩu" required autocomplete="current-password">

                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                                    <label for="remember">Lưu đăng nhập</label>
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}">
                                                            Quên mật khẩu?
                                                        </a>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-dark btn--md">
                                                    <span>Đăng nhập</span>
                                                </button>
                                            </div>

                                            <div class="row my-3">
                                                <div class="col-5 text-right"><i class="fab fa-google-plus-g"></i> Google</div>
                                                <div class="col-2 text-center">Hoặc</div>
                                                <div class="col-5 text-left">Facebook <i class="fab fa-facebook"></i></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection
