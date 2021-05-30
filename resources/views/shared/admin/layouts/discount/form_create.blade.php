<div class="modal fade" tabindex="-1" role="dialog" id="discount-create">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Thêm khuyến mại</h5>
                <form id="form-create" action="{{route('admin.discount.store')}}"
                      method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Tên khuyến mại</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') error @enderror"
                                       id="full-name"
                                       value="{{ old('name') }}" placeholder="Tên khuyến mại">
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
                                <label class="form-label" for="full-name">% Giảm giá</label>
                                <input type="text" name="percent"
                                       class="form-control @error('percent') error @enderror"
                                       id="full-name"
                                       value="{{ old('percent') }}" placeholder="% Giảm giá">
                            </div>
                            @error('name')
                            <strong>
                                <small
                                    class="text-danger">{{ $message }}
                                </small>
                            </strong>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label" for="from-date">Từ ngày</label>
                                    <input type="text"
                                           class="form-control @error('from_date') error @enderror date-picker"
                                           name="from_date" id="from-date"
                                           value="{{old('from_date')}}"
                                           data-date-format="yyyy-mm-dd"
                                           placeholder="yyyy-mm-dd">
                                </div>
                                @error('from_date')
                                <strong>
                                    <small
                                        class="text-danger">{{ $message }}
                                    </small>
                                </strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <label class="form-label" for="to-date">Đến ngày</label>
                                    <input type="text"
                                           class="form-control @error('to_date') error @enderror date-picker"
                                           name="to_date" id="to-date"
                                           value="{{old('to_date')}}"
                                           data-date-format="yyyy-mm-dd"
                                           placeholder="yyyy-mm-dd">
                                </div>
                                @error('to_date')
                                <strong>
                                    <small
                                        class="text-danger">{{ $message }}
                                    </small>
                                </strong>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <a href="#" class="btn btn-lg btn-primary"
                                       onclick="event.preventDefault();
                                                        document.getElementById('form-create').submit();">
                                        Thêm mới
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .tab-content -->
                </form>
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->
