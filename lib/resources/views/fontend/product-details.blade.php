@extends('fontend.master')
@section('title','Chi tiết sản phẩm')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="categories_banner_area" style="background: url({{asset('/lib/storage/app/image/banner/banner1.jpg')}}) no-repeat scroll center center">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>{{$prodById->name}}</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li class="current"><a href="#">{{$prodById->name}}</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Product Details Area =================-->
        <section class="product_details_area" id="detailDiv">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product_details_slider">
                            <div id="product_slider" class="rev_slider" data-version="5.3.1.6">
                                <ul>	<!-- SLIDE  -->
                                    <li data-index="{{$prodById->image}}" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{asset('/lib/storage/app/image/product/'.$prodById->image)}}"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Ishtar X Tussilago" data-param1="25/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('/lib/storage/app/image/product/'.$prodById->image)}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <!-- SLIDE  -->
                                    @foreach($listImg as $img)
                                    <li data-index="{{$img}}" data-transition="scaledownfrombottom" data-slotamount="7"  data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1500"  data-thumb="{{asset('/lib/storage/app/image/product/'.$img)}}"  data-rotate="0"  data-saveperformance="off"  data-title="Los Angeles" data-param1="13/08/2015" data-description="">
                                        <!-- MAIN IMAGE -->
                                        <img src="{{asset('/lib/storage/app/image/product/'.$img)}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>
                                        <!-- LAYERS -->
                                    </li>
                                    <!-- SLIDE  -->
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="product_details_text">
                            <h3>{{$prodById->name}}</h3>
                            @if($prodById->is_sale == true)
                                <h4>{{number_format($prodById->promotion_price,0,',','.')}} VNĐ</h4>
                            @else
                                <h4>{{number_format($prodById->unit_price,0,',','.')}} VNĐ</h4>
                            @endif
                            <p>{{$prodById->miniDesc}}</p>
                            <!-- <div class="p_color">
                                <h4 class="p_d_title">color <span>*</span></h4>
                                <ul class="color_list">
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </div>
                            <div class="p_color">
                                <h4 class="p_d_title">size <span>*</span></h4>
                                <select class="selectpicker">
                                    <option>Select your size</option>
                                    <option>Select your size M</option>
                                    <option>Select your size XL</option>
                                </select>
                            </div> -->
                            <div class="quantity">
                                <!-- <div class="custom">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                    <input type="text" name="qty" id="sst" maxlength="12" value="01" title="Quantity:" class="input-text qty">
                                    <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                </div> -->
                                <a class="add_cart_btn" href="{{asset('cart/add/'.$prodById->id)}}">add to cart</a>
                            </div>
                            <div class="shareing_icon">
                                <h5>share :</h5>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Product Description Area =================-->
        <section class="product_description_area">
            <div class="container">
                <nav class="tab_menu">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả sản phẩm</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</a>
                        <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tags</a>
                        <a class="nav-item nav-link" id="nav-info-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="false">additional information</a>
                        <a class="nav-item nav-link" id="nav-gur-tab" data-toggle="tab" href="#nav-gur" role="tab" aria-controls="nav-gur" aria-selected="false">gurantees</a> -->
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <p>{{$prodById->description}}</p>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=2282681311991915&autoLogAppEvents=1"></script>
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="1100" data-numposts="10"></div>
                    </div>
                    <!-- <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div>
                    <div class="tab-pane fade" id="nav-gur" role="tabpanel" aria-labelledby="nav-gur-tab">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.  Emo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur.</p>
                    </div> -->
                </div>
            </div>
        </section>
        <!--================End Product Details Area =================-->
        
        <!--================Our Latest Product Area =================-->
        <section class="our_latest_product">
            <div class="container">
                <div class="s_m_title">
                    <h2>Sản phẩm cùng loại</h2>
                </div>
                <div class="l_product_slider owl-carousel">
                @foreach($listProdByCate as $prod)
                    <div class="item">
                        
                        <div class="l_product_item">
                            <div class="l_p_img">
                                <img src="{{asset('/lib/storage/app/image/product/'.$prod->image)}}" alt="{{$prod->name}}">
                                    @if($prod->new == true)
                                        <h5 class="new">Mới</h5>
                                    @elseif($prod->is_sale == true)
                                        <h5 class="sale">Khuyến mãi</h5>
                                    @elseif($prod->count_buy >= 15)
                                        <h5 class="sale">Hot</h5>
                                    @endif
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
        <script>
            $(document).ready(function () {
                // Handler for .ready() called.
                $('html, body').animate({
                    scrollTop: $('#detailDiv').offset().top
                }, 'slow');
            });
        </script>
 @stop