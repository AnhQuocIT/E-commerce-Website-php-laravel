@extends('fontend.master')
@section('title','Liên hệ')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Liên hệ</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li><a href="{{asset('contact')}}">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area p_100">
            <div class="container">
                <div class="contact_title">
                    <h2>Thông tin chung</h2>
                    <p>Mọi thắc mắc quý khách vui lòng liện hệ các thông tin bên dưới.</p>
                </div>
                <div class="row contact_details">
                    <div class="col-lg-4 col-md-6">
                        <div class="media">
                            <div class="d-flex">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <p>Tân Bình,<br />TP.Hồ Chí Minh</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="media">
                            <div class="d-flex">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <a href="tel:+1109171234567">+110 - 917 - 123 - 4567</a>
                                <a href="tel:+1101911897654">+110 - 191 - 189 - 7654</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="media">
                            <div class="d-flex">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <a href="mailto:shopemail1@gmail.com">shopemail1@gmail.com</a>
                                <a href="mailto:shopemail2@gmail.com">shopemail2@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact_form_inner">
                    <h3>Gủi phản hồi</h3>
                    <form class="contact_us_form row" method="post" id="contactForm" novalidate="novalidate">
                        <div class="form-group col-lg-6">
                            <input name="name" type="text" class="form-control" id="name" name="name" placeholder="Full Name *">
                        </div>
                        <div class="form-group col-lg-6">
                            <input name="email" type="email" class="form-control" id="email" name="email" placeholder="Email Address *">
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" class="form-control" name="message" id="message" rows="1" placeholder="Type Your Message..."></textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <button type="submit" value="submit" class="btn update_btn form-control">Gửi thông tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--================End Contact Area =================-->
@stop