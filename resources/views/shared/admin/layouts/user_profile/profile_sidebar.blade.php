<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user-avatar bg-primary">
                    <span>AB</span>
                </div>
                <div class="user-info">
                    <span class="lead-text">{{$admin->name}}</span>
                    <span class="sub-text">{{$admin->email}}</span>
                </div>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Thay ảnh đại diện</span></a></li>
                                <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Cập nhật thông tin</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .user-card -->
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="user-account-info py-0">
                <h6 class="overline-title-alt">Đăng nhập gần nhất</h6>
                <p>06-29-2020 02:39pm</p>
                <h6 class="overline-title-alt">Địa chỉ IP đăng nhập</h6>
                <p>192.129.243.28</p>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner p-0">
            <ul class="link-list-menu nav nav-tabs">
                <li><a data-toggle="tab" href="{{route('admin.user.info', Auth('admin')->id())}}" class="active" href="#"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                <li><a data-toggle="tab" href="#notification" href="#"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
                <li><a data-toggle="tab" href="#settings" href="#"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                <li><a data-toggle="tab" href="#activity" href="#"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
            </ul>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- card-aside -->
