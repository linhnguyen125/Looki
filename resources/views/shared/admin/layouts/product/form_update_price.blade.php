<div class="modal fade" tabindex="-1" role="dialog" id="update-price-{{$product->id}}">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-sm">
                <form action="{{route('admin.product.update_price', $product->id)}}"
                      method="POST">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="price-{{$product->id}}">Giá bán</label>
                                <input type="text" name="price"
                                       class="form-control @error('price') error @enderror"
                                       id="price-{{$product->id}}"
                                       value="{{ $product->price }}" placeholder="Giá bán">
                            </div>
                            @error('price')
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
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Cập nhật
                                    </button>
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
