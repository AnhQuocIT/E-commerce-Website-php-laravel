@extends('fontend.master')
@section('title','Tìm kiếm')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="categories_banner_area" style="background: url({{asset('/lib/storage/app/image/banner/banner1.jpg')}}) no-repeat scroll center center">
            <div class="container">
                <div class="c_banner_inner">
                    <h3>Tìm kiếm với từ khóa "{{$keyword}}"</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li class="current"><a href="#">Tìm kiếm</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================Categories Product Area =================-->
        
        <section class="no_sidebar_2column_area">
            <div class="container">
                <div class="two_column_product">
                    <div class="row">
                        @foreach($listSearch as $prod)
                        <div class="col-lg-3 col-sm-6">
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
                    <nav aria-label="Page navigation example" class="pagination_area">
                        {{$listSearch->links()}}
                    </nav>
                </div>
            </div>
        </section>
        <!--================End Categories Product Area =================-->
@stop