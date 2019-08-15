@extends('fontend.master')
@section('title','Thanh toán')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Thanh toán</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li><a href="{{asset('cart/show')}}">Giỏ hàng</a></li>
                        <li><a href="{{asset('cart/checkout')}}">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="emty_cart_area p_100" id="completeDiv">
            <div class="container">
                <div class="alert alert-success">
                    <strong>Quý khách đã đặt hàng thành công!</strong>
                    <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin Khách hàng của chúng Tôi</p>
                    <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
                    <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng</p>
                    <p>• Trụ sở chính:</p>
                    <p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
        <script>
            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#completeDiv').offset().top
                }, 'slow');
            });
        </script>
@stop