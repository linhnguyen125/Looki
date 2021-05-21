@extends('layouts.admin.admin')

@section('title', 'Thêm mới sản phẩm')

@section('script')
    <script src="{{asset('bootstrap/js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.tiny.cloud/1/c2smjg6a8qpnm09rt8vnh82ycak6loc0rek9ik9f5s1a3kz5/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script type="text/javascript">
        var editor_config = {
            path_absolute: "http://localhost/Looki/",
            selector: "textarea#detail,#description",
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullpage | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                },
                file: {
                    title: 'File',
                    items: 'newdocument restoredraft | preview | print '
                },
                edit: {
                    title: 'Edit',
                    items: 'undo redo | cut copy paste | selectall | searchreplace'
                },
                view: {
                    title: 'View',
                    items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen'
                },
                insert: {
                    title: 'Insert',
                    items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime'
                },
                format: {
                    title: 'Format',
                    items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align lineheight | forecolor backcolor | removeformat'
                },
                tools: {
                    title: 'Tools',
                    items: 'spellchecker spellcheckerlanguage | code wordcount'
                },
                table: {
                    title: 'Table',
                    items: 'inserttable | cell row column | tableprops deletetable'
                },
                help: {
                    title: 'Help',
                    items: 'help'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            relative_urls: false,
            file_picker_callback: function (callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);

    </script>
    <script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Thêm mới sản phẩm</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                        class="icon ni ni-arrow-left"></em><span>Trở về</span></a>
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                                        class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    @include('shared.admin.layouts.alert')
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-content">
                                    <div class="card-inner">
                                        <div class="nk-block">
                                            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="row gy-4">
                                                    <div class="row col-md-8">

                                                        <div class="col-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="name">Tên sản
                                                                    phẩm</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text"
                                                                           class="form-control @error('name') error @enderror"
                                                                           name="name" value="{{old('name')}}" id="name"
                                                                           placeholder="Tên sản phẩm">
                                                                </div>
                                                                @error('name')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <div class="form-group">
                                                                <label class="form-label" for="description">Mô tả sản
                                                                    phẩm</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea
                                                                        class="form-control @error('description') error @enderror form-control-sm"
                                                                        id="description"
                                                                        name="description"
                                                                        placeholder="Mô tả sản phẩm">{{old('description')}}</textarea>
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
                                                            <div class="form-group">
                                                                <label class="form-label" for="detail">Chi tiết sản
                                                                    phẩm</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea
                                                                        class="form-control @error('detail') error @enderror form-control-sm"
                                                                        id="detail"
                                                                        name="detail"
                                                                        placeholder="Chi tiết sản phẩm">{{old('detail')}}</textarea>
                                                                </div>
                                                            </div>
                                                            @error('detail')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                    </div>

                                                    <div class="row col-md-4">

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="price">Giá SP</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text"
                                                                           class="form-control @error('price') error @enderror"
                                                                           name="price" value="{{old('price')}}"
                                                                           id="price"
                                                                           placeholder="Giá SP">
                                                                </div>
                                                                @error('price')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="category">Danh
                                                                    mục</label>
                                                                <select
                                                                    class="form-select @error('category_id') error @enderror"
                                                                    name="category_id" id="category">
                                                                    @foreach ($division_categories as $division_category)
                                                                        <option value="{{ $division_category->id }}"
                                                                            {{old('category_id') == $division_category->id ? 'selected' : ''}}>
                                                                            {{ str_repeat('== ', $division_category->level) . $division_category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            @error('category_id')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="stock">Số lượng</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text"
                                                                           class="form-control @error('stock') error @enderror"
                                                                           name="stock" value="{{old('stock')}}"
                                                                           id="stock"
                                                                           placeholder="Số lượng">
                                                                </div>
                                                                @error('stock')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="meta-keywords">Meta
                                                                    keywords</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text"
                                                                           class="form-control @error('meta_keywords') error @enderror"
                                                                           name="meta_keywords"
                                                                           value="{{old('meta_keywords')}}"
                                                                           id="meta-keywords"
                                                                           placeholder="Meta keywords">
                                                                </div>
                                                                @error('meta_keywords')
                                                                <strong>
                                                                    <small
                                                                        class="text-danger">{{ $message }}
                                                                    </small>
                                                                </strong>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="meta-description">Meta
                                                                    description</label>
                                                                <div class="form-control-wrap">
                                                                    <textarea
                                                                        class="form-control @error('meta_description') error @enderror form-control-sm"
                                                                        id="meta-description"
                                                                        name="meta_description"
                                                                        placeholder="Meta description">{{old('meta_description')}}</textarea>
                                                                </div>
                                                            </div>
                                                            @error('meta_description')
                                                            <strong>
                                                                <small
                                                                    class="text-danger">{{ $message }}
                                                                </small>
                                                            </strong>
                                                            @enderror
                                                        </div>

                                                        <div class="row col-12 p-1">
                                                            <div class="col-md-6 p-1">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" name="sale" {{old('sale') ? 'checked' : ''}}
                                                                           class="custom-control-input" value="1" id="sale">
                                                                    <label class="custom-control-label" for="sale">Giảm
                                                                        giá</label>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 p-1">
                                                                <div class="custom-control custom-switch">
                                                                    <input type="checkbox" name="status" {{old('status') ? 'checked' : ''}}
                                                                           class="custom-control-input" value="1" id="status">
                                                                    <label class="custom-control-label" for="status">Hiển
                                                                        thị</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                          <span class="input-group-btn">
                                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                               class="btn btn-primary text-white">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                            </a>
                                                          </span>
                                                                    <input id="thumbnail" class="form-control"
                                                                           type="text" name="thumbnail">
                                                                </div>
                                                                <div id="holder"
                                                                     style="margin-top:15px;max-height:100px;"></div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                        <div class="col-12 ml-2">
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-lg btn-primary">
                                                                    Thêm mới
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div><!-- .nk-block -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card-content -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
