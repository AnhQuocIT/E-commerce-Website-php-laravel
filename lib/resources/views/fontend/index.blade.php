@extends('fontend.master')
@section('title','Trang chủ')
@section('main')

<!--================Slider Area =================-->
<section class="main_slider_area">
            <div class="container">
                <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
                    <ul>
                        <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="img/home-slider/sl1.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                        </li>
                        <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-2.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <!-- MAIN IMAGE -->
                        <img src="img/home-slider/sl2.jpg"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Slider Area =================-->
        <!--================Our Latest Product Area =================-->
        <section class="our_latest_product" id="new">
            <div class="container">
                <div class="s_m_title">
                    <h2>Sản phẩm mới</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                @foreach($listNewProd as $prod)
                    <div class="item">
                        
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="{{asset('/lib/storage/app/image/product/'.$prod->image)}}" alt="{{$prod->name}}">
                                <h5 class="new">Mới</h5>
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <!-- <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li> -->
                                    <li><a class="add_cart_btn" href="{{asset('cart/add/'.$prod->id)}}">Add To Cart</a></li>
                                    <li class="p_icon"><a href="{{asset('details/'.$prod->id.'/'.$prod->slug)}}"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <h4>{{$prod->name}}</h4>
                                @if($prod->is_sale == 1)
                                    <h5><del>{{number_format($prod->unit_price,0,',','.')}}</del>  {{number_format($prod->promotion_price,0,',','.')}} VNĐ</h5>
                                @else
                                    <h5>{{number_format($prod->unit_price,0,',','.')}} VNĐ</h5>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================End Our Latest Product Area =================-->

        <!--================Our Latest Product Area =================-->
        <section class="our_latest_product" id="sale">
            <div class="container">
                <div class="s_m_title">
                    <h2>Sản phẩm khuyến mãi</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                    @foreach($listSaleProd as $prod)
                    <div class="item">
                        
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="{{asset('/lib/storage/app/image/product/'.$prod->image)}}" alt="{{$prod->name}}">
                                <h5 class="sale">Giảm giá</h5>
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <!-- <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li> -->
                                    <li><a class="add_cart_btn" href="{{asset('cart/add/'.$prod->id)}}">Add To Cart</a></li>
                                    <li class="p_icon"><a href="{{asset('details/'.$prod->id.'/'.$prod->slug)}}"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <h4>{{$prod->name}}</h4>
                                @if($prod->is_sale == 1)
                                    <h5><del>{{number_format($prod->unit_price,0,',','.')}}</del>  {{number_format($prod->promotion_price,0,',','.')}} VNĐ</h5>
                                @else
                                    <h5>{{number_format($prod->unit_price,0,',','.')}} VNĐ</h5>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================End Our Latest Product Area =================-->   
        
        <!--================Our Latest Product Area =================-->
        <section class="our_latest_product" id="hot">
            <div class="container">
                <div class="s_m_title">
                    <h2>Sản phẩm bán chạy</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                @foreach($listBestProd as $prod)
                    <div class="item">
                        
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="{{asset('/lib/storage/app/image/product/'.$prod->image)}}" alt="{{$prod->name}}">
                                <h5 class="sale">hot</h5>
                            </div>
                            <div class="l_p_text">
                                <ul>
                                    <!-- <li class="p_icon"><a href="#"><i class="icon_piechart"></i></a></li> -->
                                    <li><a class="add_cart_btn" href="{{asset('cart/add/'.$prod->id)}}">Add To Cart</a></li>
                                    <li class="p_icon"><a href="{{asset('details/'.$prod->id.'/'.$prod->slug)}}"><i class="fas fa-eye"></i></a></li>
                                </ul>
                                <h4>{{$prod->name}}</h4>
                                @if($prod->is_sale == 1)
                                    <h5><del>{{number_format($prod->unit_price,0,',','.')}}</del>  {{number_format($prod->promotion_price,0,',','.')}} VNĐ</h5>
                                @else
                                    <h5>{{number_format($prod->unit_price,0,',','.')}} VNĐ</h5>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--================End Our Latest Product Area =================-->
        
@stop