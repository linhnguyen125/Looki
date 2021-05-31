@extends('layouts.client.client')

@section('title', 'Giỏ hàng')

@section('content')
    @include('shared.client.cart.breadcrumb')
    <!-- cart start -->
    <section class="whish-list-section theme1 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form id="cart-wp">
                        @csrf
                        @if(Cart::count() > 0)
                            <div class="session">
                                <table class="table table-responsive">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center" scope="col">Hình ảnh</th>
                                        <th class="text-center" scope="col">Tên sản phẩm</th>
                                        <th class="text-center sm" scope="col">Số lượng</th>
                                        <th class="text-center sm" scope="col">Giá</th>
                                        <th class="text-center sm" scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr class="{{$item->rowId}}">
                                            <th class="text-center" scope="row">
                                                <a href="{{route('client.category', $item->options->slug)}}">
                                                    <img src="{{$item->options->thumbnail}}" alt="img" />
                                                </a>
                                            </th>
                                            <td class="text-center name">
                                                <a href="{{route('client.category', $item->options->slug)}}">
                                                    <span class="whish-title">{{$item->name}}</span>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <div class="product-count style">
                                                    <div class="count d-flex justify-content-center">
                                                        <input type="hidden" class="{{$item->rowId}}" value="{{$item->qty}}"
                                                                data-row_id="{{$item->rowId}}" data-url_update="{{route('client.cart.update')}}"
                                                               data-url_delete="{{route('client.cart.delete')}}"
                                                               data-img="{{asset('assets/client/img/cart/null.png')}}" data-home="{{url('/')}}"
                                                        />
                                                        <input type="number" name="qty" min="1" max="100" step="1" value="{{$item->qty}}" disabled />
                                                        <div class="button-group">
                                                            <a href="javascript:void(0)" class="count-btn increment update-cart" data-row_id="{{$item->rowId}}">
                                                                <i class="fas fa-chevron-up"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" class="count-btn decrement update-cart" data-row_id="{{$item->rowId}}">
                                                                <i class="fas fa-chevron-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="whish-list-price {{$item->rowId}}">{{ number_format($item->subtotal, 0, '', '.') }} đ</span>
                                            </td>

                                            <td class="text-center">
                                                <a href="javascript:void(0)" class="delete" id="{{$item->rowId}}" data-row_id="{{$item->rowId}}" title="Xóa">
                                                    <span class="trash"><i class="fas fa-trash-alt"></i> </span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td class="text-right py-3" colspan="5">
                                                <span class="whish-list-price d-block mb-2 total">Tổng thanh toán: {{Cart::total()}} đ</span>
                                                <a href="{{route('client.checkout')}}" class="btn btn-dark btn--lg">Thanh Toán</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center" style="min-height: 300px">
                                <span class="mb-3">
                                    <img src="{{asset('assets/client/img/cart/null.png')}}" alt="null">
                                </span>
                                <p class="mb-3">Giỏ hàng của bạn còn trống</p>
                                <a href="{{url('/')}}" class="btn btn--md btn-dark px-5">MUA NGAY</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- cart end -->
@endsection
