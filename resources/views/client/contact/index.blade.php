@extends('layouts.client.client')

@section('title', 'Liên hệ')

@section('css')
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 400px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 400px;
        }

        .gmap_iframe {
            height: 400px !important;
        }
    </style>
@endsection

@section('content')
    <!-- map start -->
    <div class="map">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=xóm 18, Xã yên đồng, Nam Định&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                <a href="https://www.fridaynightfunkin.net/">Friday Night Funkin PC</a>
            </div>
        </div>
    </div>
    <!-- map end -->
    <!-- contact-section satrt -->
    <section class="contact-section pt-80 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-30">
                    <!--  contact page side content  -->
                    <div class="contact-page-side-content">
                        <h3 class="contact-page-title">Liên hệ với Looki</h3>
                        <p class="contact-page-message mb-30">
                            Tiên phong trong việc phát minh và ứng dụng viên uống bổ sung các dưỡng chất thiết yếu giúp cải thiện sức khỏe làn da từ sâu bên trong cơ thể.<br>
                            Với những cống hiến của mình cho Ngành Chăm sóc da và sức khỏe cùng những đóng góp tích cực cho xã hội,
                            chúng tôi đã đang và sẽ tiếp tục là người dẫn dắt, truyền cảm hứng để mọi người có thể hướng đến nét đẹp hoàn
                            thiện không chỉ bên ngoài mà còn trong tâm hồn.
                        </p>
                        <!--  single contact block  -->

                        <div class="single-contact-block">
                            <h4><i class="fa fa-fax"></i> Địa chỉ</h4>
                            <p>Xóm 18, An Trung, Yên Đồng, Ý Yên, Nam Định</p>
                        </div>

                        <!--  End of single contact block -->

                        <!--  single contact block -->

                        <div class="single-contact-block">
                            <h4><i class="fa fa-phone"></i> Điện thoại</h4>
                            <p>
                                <a href="tel:0981958120">Mobile: (+84) 981 958 120</a>
                            </p>
                            <p><a href="tel:0981958120">Hotline: 0981 958 120</a></p>
                        </div>

                        <!-- End of single contact block -->

                        <!--  single contact block -->

                        <div class="single-contact-block">
                            <h4><i class="fas fa-envelope"></i> Email</h4>
                            <p>
                                <a href="mailto:hethongcntt.unitop@gmail.com">hethongcntt.unitop@gmail.com</a>
                            </p>
                            <p>
                                <a href="mailto:support.unitop@gmail.com">support.unitop@gmail.com</a>
                            </p>
                        </div>

                        <!--=======  End of single contact block  =======-->
                    </div>

                    <!--=======  End of contact page side content  =======-->
                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <!--  contact form content -->
                    <div class="contact-form-content">
                        <h3 class="contact-page-title">Cho chúng tôi biết thông điệp của bạn</h3>
                        <div class="contact-form">
                            <form
                                id="contact-form"
                                action="assets/php/contact.php"
                                method="POST">
                                <div class="form-group">
                                    <label>Tên của bạn <span class="required">*</span></label>
                                    <input type="text" name="name" id="name"/>
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ email <span class="required">*</span></label>
                                    <input type="email" name="email" id="email"/>
                                </div>
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" name="subject" id="subject"/>
                                </div>
                                <div class="form-group">
                                    <label>Thông điệp của bạn</label>
                                    <textarea
                                        name="contactMessage"
                                        class="pb-10"
                                        id="contactMessage"
                                    ></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <button
                                        type="submit"
                                        value="submit"
                                        id="submit"
                                        class="btn btn-dark btn--lg"
                                        name="submit">
                                        Gửi
                                    </button>
                                </div>
                            </form>
                        </div>
                        <p class="form-message mt-10"></p>
                    </div>
                    <!-- End of contact -->
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->
@endsection
