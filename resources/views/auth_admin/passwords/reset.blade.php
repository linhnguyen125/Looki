@extends('layouts.admin.auth')

@section('content')
    <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
            @include('shared.admin.auth.logoHeader')
            <div class="card">
                <div class="card-inner card-inner-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Đặt lại mật khẩu</h5>
                            <div class="nk-block-des">
                                <p>Đặt lại mật khẩu mới cho tài khoản của bạn.</p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email">Email</label>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg"
                                   name="email" id="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Mật khẩu</label>
                            </div>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control @error('password') is-invalid @enderror form-control-lg"
                                       name="password" id="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password-confirm">Xác nhận mật khẩu</label>
                            </div>
                            <div class="form-control-wrap">
                                <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg"
                                       name="password_confirmation" id="password-confirm" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Cập nhật</button>
                        </div>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-pro alert-primary">
                            <div class="alert-text">
                                <h6>Thành công</h6>
                                <p>{{session('status')}}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('shared.admin.auth.footer')
    </div>
@endsection
