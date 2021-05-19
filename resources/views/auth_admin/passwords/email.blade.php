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
                                <p>Nếu bạn quên mật khẩu của mình, chúng tôi sẽ gửi email hướng dẫn cho bạn để đặt lại mật khẩu của bạn.</p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="email">Email</label>
                            </div>
                            <input type="email" class="form-control @error('email') is-invalid @enderror form-control-lg"
                                   name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Gửi link lấy lại mật khẩu</button>
                        </div>
                    </form>
                    <div class="form-note-s2 text-center pt-4">
                        <a href="{{route('admin.login')}}"><strong>Trở lại đăng nhập</strong></a>
                    </div>
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
