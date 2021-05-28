@extends('layouts.client.client')

@section('title')
    {{Auth::user()->name}}
@endsection

@section('content')
    @include('shared.client.account.breadcrumb')
    <div class="my-account pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title text-capitalize mb-30 pb-25">Tài Khoản</h3>
                </div>
                <!-- My Account Tab Menu Start -->
                <div class="col-lg-3 col-12 mb-30">
                    <div class="myaccount-tab-menu nav" role="tablist">
                        <a href="#orders" data-toggle="tab">
                            <i class="fa fa-cart-arrow-down"></i> Đơn hàng
                        </a>

                        <a href="#address-edit" data-toggle="tab">
                            <i class="fa fa-map-marker"></i> Địa chỉ</a>

                        <a href="#account-info" data-toggle="tab" class="active">
                            <i class="fa fa-user"></i> Chi tiết
                        </a>
                    </div>
                </div>
                <!-- My Account Tab Menu End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-9 col-12 mb-30">
                    <div class="tab-content" id="myaccountContent">
                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Orders</h3>

                                <div class="myaccount-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mostarizing Oil</td>
                                            <td>Aug 22, 2018</td>
                                            <td>Pending</td>
                                            <td>$45</td>
                                            <td>
                                                <a href="shopping-cart.html" class="ht-btn black-btn"
                                                >View</a
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Katopeno Altuni</td>
                                            <td>July 22, 2018</td>
                                            <td>Approved</td>
                                            <td>$100</td>
                                            <td>
                                                <a href="shopping-cart.html" class="ht-btn black-btn"
                                                >View</a
                                                >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Murikhete Paris</td>
                                            <td>June 12, 2017</td>
                                            <td>On Hold</td>
                                            <td>$99</td>
                                            <td>
                                                <a href="shopping-cart.html" class="ht-btn black-btn"
                                                >View</a
                                                >
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Billing Address</h3>

                                <address>
                                    <p><strong>Alex Tuntuni</strong></p>
                                    <p>
                                        1355 Market St, Suite 900 <br />
                                        San Francisco, CA 94103
                                    </p>
                                    <p>Mobile: (123) 456-7890</p>
                                </address>

                                <a
                                    href="#"
                                    class="ht-btn black-btn d-inline-block edit-address-btn">
                                    <i class="fa fa-edit"></i>Edit Address
                                </a>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div
                            class="tab-pane fade active show"
                            id="account-info"
                            role="tabpanel">
                            <div class="myaccount-content">
                                <h3>Thông tin chi tiết</h3>

                                <div class="account-details-form">
                                    <form action="#">
                                        <div class="row text-dark">
                                            <div class="col-3 text-right my-3">
                                                <label for="email">Email đăng nhập :</label>
                                            </div>

                                            <div class="col-9 my-3">
                                                <input type="email" id="email" value="{{Auth::user()->email}}" placeholder="Email đăng nhập" disabled/>
                                            </div>

                                            <div class="col-3 text-right my-3">
                                                <label for="name">Họ và tên :</label>
                                            </div>

                                            <div class="col-9 my-3">
                                                <input type="text" id="name" name="name" value="{{Auth::user()->name}}" placeholder="Họ và tên" />
                                            </div>

                                            <div class="col-3 text-right my-3">
                                                <label for="phone">Số điện thoại :</label>
                                            </div>

                                            <div class="col-9 my-3">
                                                <input type="text" id="phone" name="name" value="{{Auth::user()->phone}}" placeholder="Số điện thoại"/>
                                            </div>

                                            <div class="col-3 text-right my-3">
                                                <label for="email">Giới tính :</label>
                                            </div>

                                            <div class="col-9 my-3">
                                                <input type="radio" id="male" name="gender" value="male">
                                                <label for="male" class="mr-3">Nam</label>
                                                <input type="radio" id="female" name="gender" value="female">
                                                <label for="female">Nữ</label>
                                            </div>

                                            @if(Auth::user()->provider_name = null)
                                                <div class="col-12 mb-30">
                                                    <h4>Đổi mật khẩu</h4>
                                                </div>

                                                <div class="col-12 mb-30">
                                                    <input id="current-pwd" placeholder="Current Password" type="password"/>
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="new-pwd" placeholder="New Password" type="password" />
                                                </div>

                                                <div class="col-lg-6 col-12 mb-30">
                                                    <input id="confirm-pwd" placeholder="Confirm Password" type="password" />
                                                </div>

                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-dark btn--md">Thay Đổi</button>
                                                </div>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->
                    </div>
                </div>
                <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
@endsection
