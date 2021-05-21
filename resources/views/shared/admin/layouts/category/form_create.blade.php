<div class="modal fade" tabindex="-1" role="dialog" id="category-create">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Thêm danh mục sản phẩm</h5>
                <form id="form-create" action="{{route('admin.category.store')}}"
                      method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Tên danh mục</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') error @enderror"
                                       id="full-name"
                                       value="{{ old('name') }}" placeholder="Tên danh mục">
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
                                <label class="form-label" for="parent-id">Danh mục cha</label>
                                <select class="form-select @error('parent_id') error @enderror" id="parent-id"
                                        name="parent_id" data-ui="md">
                                    <option value="0">Danh mục gốc</option>
                                    @foreach ($division_categories as $division_category)
                                        <option value="{{ $division_category->id }}"
                                            {{old('parent_id') == $division_category->id ? 'selected' : ''}}>
                                            {{ str_repeat('-- ', $division_category->level) . $division_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('parent_id')
                            <strong>
                                <small
                                    class="text-danger">{{ $message }}
                                </small>
                            </strong>
                            @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="description">Mô tả</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control @error('description') error @enderror form-control-sm" id="description"
                                              name="description" placeholder="Mô tả danh mục">{{old('description')}}</textarea>
                                </div>
                            </div>
                            @error('description')
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
