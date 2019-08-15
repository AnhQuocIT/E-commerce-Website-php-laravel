@extends('fontend.master')
@section('title','Xác nhận đơn hàng')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Thanh toán giỏ hàng</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li><a href="{{asset('cart/show')}}">Giỏ hàng</a></li>
                        <li><a href="{{asset('cart/checkout')}}">Thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Register Area =================-->
        <section class="register_area p_100" id="regDiv">
            <form method="post" accept-charset="utf-8">
            {{ csrf_field() }}
                <div class="container">
                    <div class="register_inner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="billing_details">
                                    <h2 class="reg_title">Thông tin hóa đơn</h2>
                                    @if(count($errors)>0)
                                        <div class="alert alert-danger">
                                            @foreach($errors->all() as $error)
                                                {{$error}} <br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <form class="billing_inner row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="name">Họ tên <span>*</span></label>
                                                <input name="name" value="{{($customer->check()? $customer->user()->name:'')}}" required type="text" class="form-control" id="name" aria-describedby="name" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="address">Địa chỉ <span>*</span></label>
                                                <input name="address" value="{{($customer->check()? $customer->user()->address:'')}}" required type="text" class="form-control" id="address" aria-describedby="address">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email">Email <span>*</span></label>
                                                <input name="email" value="{{($customer->check()? $customer->user()->email:'')}}" required type="email" class="form-control" id="email" aria-describedby="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại <span>*</span></label>
                                                <input name="phone" value="{{($customer->check()? $customer->user()->phone_number:'')}}" required type="text" class="form-control" id="phone" aria-describedby="phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="order">Ghi chú</label>
                                                <textarea name="note" class="form-control" id="order" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="order_box_price">
                                    <h2 class="reg_title">Hóa đơn</h2>
                                    <div class="payment_list">
                                        <div class="price_single_cost">
                                            @foreach($items as $item)
                                                <h5>{{$item->name}} <span>{{number_format($item->price,0,',','.')}}</span></h5>
                                            @endforeach
                                            <!-- <h4>Cart Subtotal <span>$50.00</span></h4> -->
                                            <h3><span class="normal_text">Order Totals</span> <span>{{Cart::total()}} VNĐ</span></h3>
                                        </div>
                                        <div id="accordion" role="tablist" class="price_method">
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <input name="payment" value="COD" data-toggle="collapse" type="radio" href="#collapseOne" role="button" checked="checked" aria-expanded="true" aria-controls="collapseOne">
                                                        Trả tiền sau khi nhận hàng
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        Khách sẽ trả tiền khi đã nhận được hàng. 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <input name="payment" value="ATM" class="collapsed" type="radio" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                                                        Chuyển khoản
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <p>Số TK: 021156484645</p> 
                                                        <p>Chủ TK: Nguyen Anh Quoc</p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" value="submit" class="btn subs_btn form-control">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!--================End Register Area =================-->
        <script>
            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#regDiv').offset().top
                }, 'slow');
            });
        </script>
     @stop