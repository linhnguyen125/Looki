@extends('layouts.client.client')

@section('title', 'Quên mật khẩu')

@section('content')
    <div class="login-register-area pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <h4>Đặt lại mật khẩu</h4>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf

                                            <input type="hidden" name="token" value="{{ $token }}">

                                            <div class="input-group has-validation mb-30">
                                                <input id="email" type="email" class="mb-1 form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                                        placeholder="Địa chỉ email">

                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="input-group has-validation mb-10">
                                                <input iid="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="new-password"
                                                       placeholder="Mật khẩu">

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
                                                    <span>Đồng ý</span>
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
@endsection
