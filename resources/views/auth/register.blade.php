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
                            <a href="{{route('login')}}">
                                <h4>Đăng nhập</h4>
                            </a>
                            <a class="active" href="{{route('register')}}">
                                <h4>Đăng ký</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="input-group has-validation mb-30">
                                                <input id="name" type="text" class="mb-1 form-control @error('name') is-invalid @enderror" name="name"
                                                       value="{{ old('name') }}" required autocomplete="name" placeholder="Tên của bạn">

                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="input-group has-validation mb-30">
                                                <input id="email" type="email" class="mb-1 form-control @error('email') is-invalid @enderror" name="email"
                                                       value="{{ old('email') }}" placeholder="Địa chỉ email" required autocomplete="email" autofocus>

                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="input-group has-validation mb-30">
                                                <input id="password" type="password" class="mb-1 form-control @error('password') is-invalid @enderror" name="password"
                                                       placeholder="Mật khẩu" required autocomplete="current-password">

                                                @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="input-group mb-10">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                                       required autocomplete="new-password"
                                                       placeholder="Xác nhận mật khẩu" >
                                            </div>

                                            <div class="button-box">
                                                <button type="submit" class="btn btn-dark btn--md">
                                                    <span>Đăng ký</span>
                                                </button>
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
