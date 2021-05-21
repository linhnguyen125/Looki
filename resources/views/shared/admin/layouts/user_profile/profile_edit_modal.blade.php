<div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Cập nhật thông tin</h5>
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <input type="hidden" id="updateDistrict" value="{{route('update.district')}}">
                <input type="hidden" id="updateWard" value="{{route('update.ward')}}">
                <form id="update-profile" action="{{route('admin.user.update_profile', Auth::guard('admin')->id())}}"
                      method="POST">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Họ và tên</label>
                                        <input type="text" name="name" class="form-control @error('name') error @enderror form-control-lg"
                                               id="full-name"
                                               value="{{ $admin->name ?? old('name') }}" placeholder="Họ và tên">
                                    </div>
                                    @error('name')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone-no">Số điện thoại</label>
                                        <input type="text" class="form-control @error('phone') error @enderror form-control-lg" id="phone-no"
                                               name="phone"
                                               value="{{$admin->phone ?? old('phone')}}"
                                               placeholder="Số điện thoại">
                                    </div>
                                    @error('phone')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="gender">Giới tính</label>
                                        <select class="form-select @error('gender') error @enderror" name="gender" id="gender" data-ui="lg">
                                            <option value="male" {{$admin->gender == 'male' ? 'selected' : ''}}>Nam
                                            </option>
                                            <option value="female" {{$admin->gender == 'female' ? 'selected' : ''}}>Nữ
                                            </option>
                                            <option value="unknown" {{$admin->gender == 'unknown' ? 'selected' : ''}}>
                                                Không xác định
                                            </option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Ngày sinh</label>
                                        <input type="text" name="date_of_birth"
                                               class="form-control @error('date_of_birth') error @enderror form-control-lg date-picker"
                                               value="{{$admin->date_of_birth ?? old('date_of_birth')}}" id="birth-day"
                                               data-date-format="yyyy-mm-dd" placeholder="Ngày sinh">
                                    </div>
                                    @error('date_of_birth')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <a href="#" class="btn btn-lg btn-primary"
                                               onclick="event.preventDefault();
                                                        document.getElementById('update-profile').submit();">
                                                Update Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="address">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="province">Tỉnh/Thành phố</label>
                                        <select class="form-select @error('province') error @enderror" id="province" name="province" data-ui="lg"
                                            onchange="updateDistrict(this)">
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}"
                                                    {{$admin->address['province'] == $province->name ? 'selected' : ''}}>
                                                    {{ $province->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('province')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="district">Quận/Huyện</label>
                                        <select class="form-select @error('district') error @enderror" id="district" name="district" data-ui="lg"
                                                onchange="updateWard(this)">
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    {{$admin->address['district'] == $district->name ? 'selected' : ''}}>
                                                    {{ $district->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('district')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="ward">Phường/Thị xã</label>
                                        <select class="form-select @error('ward') error @enderror" id="ward" name="ward" data-ui="lg">
                                            @foreach ($wards as $ward)
                                                <option value="{{ $ward->id }}"
                                                    {{$admin->address['ward'] == $ward->name ? 'selected' : ''}}>
                                                    {{ $ward->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('ward')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="more">Địa chỉ nhà</label>
                                        <input type="text" name="more" class="form-control @error('more') error @enderror form-control-lg" id="more"
                                               value="{{$admin->address['more'] ?? old('more')}}">
                                    </div>
                                    @error('more')
                                    <strong>
                                        <small
                                            class="text-danger">{{ $message }}
                                        </small>
                                    </strong>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <a href="#" class="btn btn-lg btn-primary"
                                               onclick="event.preventDefault();
                                                        document.getElementById('update-profile').submit();">
                                                Update Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </form>
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="avatar-edit">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Cập nhật ảnh đại diện</h5>
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form action="{{route('admin.user.update_avatar', Auth::guard('admin')->id())}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="row gy-4">
                                <div class="form-group m-0 p-2">
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" name="avatar" value="{{old('avatar')}}"
                                                   class="custom-file-input" id="avatar">
                                            <label class="custom-file-label" for="avatar">Chọn file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
