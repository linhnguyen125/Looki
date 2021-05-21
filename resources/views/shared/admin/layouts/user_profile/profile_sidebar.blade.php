<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
    data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user-avatar bg-primary">
                    @if(Auth::guard('admin')->user()->avatar)
                        <img
                            src="{{asset(Auth::guard('admin')->user()->avatar)}}"
                            alt="">
                    @else
                        <span>
                            @php
                                $str_name = explode(' ', Auth::guard('admin')->user()->name);
                                if(count($str_name) > 1){
                                    echo strtoupper(reset($str_name)[0]) . strtoupper(end($str_name)[0]);
                                }else{
                                    echo strtoupper(reset($str_name)[0]);
                                }
                            @endphp
                        </span>
                    @endif
                </div>
                <div class="user-info">
                    <span class="lead-text">{{Auth::guard('admin')->user()->name}}</span>
                    <span class="sub-text">{{Auth::guard('admin')->user()->email}}</span>
                </div>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown"
                           href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#" data-toggle="modal"
                                       data-target="#avatar-edit"><em
                                            class="icon ni ni-camera-fill"></em><span>Thay ảnh đại diện</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .user-card -->
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="user-account-info py-0">
                <h6 class="overline-title-alt">Chỉnh sửa gần nhất</h6>
                <p>{{ \Carbon\Carbon::parse(Auth::guard('admin')->user()->updated_at)->format('d M, Y H:m:s') }}</p>
                <h6 class="overline-title-alt">Login IP</h6>
                <p>192.129.243.28</p>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li><a class="{{session('model') == 'info' ? 'active' : ''}}"
                       href="{{route('admin.user.info', Auth::guard('admin')->id())}}"><em
                            class="icon ni ni-user-fill-c"></em><span>Thông tin cá nhân</span></a>
                </li>
                <li><a class="{{session('model') == 'notifies' ? 'active' : ''}}"
                        href="{{route('admin.user.notifies')}}"><em
                            class="icon ni ni-bell-fill"></em><span>Thông báo</span></a>
                </li>
                <li><a class="{{session('model') == 'activity' ? 'active' : ''}}"
                        href="{{route('admin.user.account_activity')}}"><em
                            class="icon ni ni-activity-round-fill"></em><span>Hoạt động tài khoản</span></a>
                </li>
                <li><a class="{{session('model') == 'security' ? 'active' : ''}}"
                        href="{{route('admin.user.security_settings')}}"><em
                            class="icon ni ni-lock-alt-fill"></em><span>Cài đặt bảo mật</span></a>
                </li>
            </ul>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- card-aside -->
