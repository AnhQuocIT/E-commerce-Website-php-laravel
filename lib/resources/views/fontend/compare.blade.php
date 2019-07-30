@extends('fontend.master')
@section('title','So sánh')
@section('main')
        
        <!--================Categories Banner Area =================-->
        <section class="categories_banner_area" style="background: url({{asset('/lib/storage/app/image/banner/banner1.jpg')}}) no-repeat scroll center center">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>simple product Layout 03</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li class="current"><a href="product-details2.html">Simple Product 03</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Compare Area =================-->
        <section class="product_compare_area">
            <div class="container">
                <div class="compare_table">
                    <div class="table-responsive-md">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Samsunga galaxy l7</th>
                                    <th scope="col">xiaomi redmi note 4</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><span>Summary</span></th>
                                    <td>
                                        <img src="img/product/compare/compare-1.png" alt="">
                                        <h3><span>Price</span> $250.00</h3>
                                        <ul>
                                            <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                            <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <img src="img/product/compare/compare-2.png" alt="">
                                        <h3><span>Price</span> $200.00</h3>
                                        <ul>
                                            <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li>
                                            <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                            <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Network</span></th>
                                    <td>
                                        <h6>GSM / HSPA / LTE</h6>
                                    </td>
                                    <td><h6>GSM / HSPA / LTE</h6></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Launch</span></th>
                                    <td><h6>2016, August</h6></td>
                                    <td><h6>2016, August</h6></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Body</span></th>
                                    <td><h6>151.7 x 75 x 8 mm</h6></td>
                                    <td><h6>151.7 x 75 x 8 mm</h6></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Display</span></th>
                                    <td><h6>PLS TFT Capacitive Touchscreen</h6></td>
                                    <td><h6>PLS TFT Capacitive Touchscreen</h6></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Platform</span></th>
                                    <td><h6>Android OS</h6></td>
                                    <td><h6>Android OS</h6></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Memory</span></th>
                                    <td><h6>MicroSD,Up to 256 GB</h6></td>
                                    <td><h6>MicroSD,Up to 256 GB</h6></td>
                                </tr>
                                <tr>
                                    <th scope="row"><span>Camera</span></th>
                                    <td><h6>13 MP, f/1.9 28, Autofocus</h6></td>
                                    <td><h6>13 MP, f/1.9 28, Autofocus</h6></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a class="add_cart_btn continue" href="#">continue shopping</a>
                </div>
            </div>
        </section>
        <!--================End Product Compare Area =================-->
        
        
@stop