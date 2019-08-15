@extends('fontend.master')
@section('title','Giỏ hàng')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Giỏ hàng</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li><a href="{{asset('cart/show')}}">Giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="emty_cart_area p_100" id="emptyCartDiv">
            <div class="container">
                <div class="emty_cart_inner">
                    <i class="icon-handbag icons"></i>
                    <h3>Giỏ hàng của bạn không có sản phẩm nào!</h3>
                    <h4>Quay lại  <a href="{{asset('/')}}">Mua sắm</a></h4>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
        <script>
            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#emptyCartDiv').offset().top
                }, 'slow');
            });
        </script>
@stop