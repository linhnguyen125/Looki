@extends('layouts.client.client')

@section('title', 'Giỏ hàng')

@section('content')
    @include('shared.client.cart.breadcrumb')
    <!-- cart start -->
    <section class="whish-list-section theme1 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-30 pb-25 text-capitalize">Giỏ hàng</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">Hình ảnh</th>
                                <th class="text-center" scope="col">Tên sản phẩm</th>
                                <th class="text-center" scope="col">Số lượng</th>
                                <th class="text-center" scope="col">Giá</th>
                                <th class="text-center" scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th class="text-center" scope="row">
                                    <img src="assets/img/product/2.png" alt="img" />
                                </th>
                                <td class="text-center">
                                  <span class="whish-title">Water and Wind Resistant cream</span>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-danger position-static">In Stock</span>
                                </td>
                                <td class="text-center">
                                    <div class="product-count style">
                                        <div class="count d-flex justify-content-center">
                                            <input type="number" min="1" max="10" step="1" value="1"/>
                                            <div class="button-group">
                                                <a href="javascript:void(0)" class="count-btn increment">
                                                    <i class="fas fa-chevron-up"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="count-btn decrement">
                                                    <i class="fas fa-chevron-down"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="whish-list-price"> $38.24 </span>
                                </td>

                                <td class="text-center">
                                    <a href="#">
                                        <span class="trash"><i class="fas fa-trash-alt"></i> </span>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-dark btn--lg">add to cart</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart end -->
@endsection
