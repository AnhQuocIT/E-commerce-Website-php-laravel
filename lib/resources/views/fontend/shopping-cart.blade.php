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
        
        <!--================Shopping Cart Area =================-->
        <section class="shopping_cart_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart_product_list">
                            <h3 class="cart_single_title">Sản phẩm của bạn</h3>
                            <div class="table-responsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Sản phẩm</th>
                                            <th scope="col">Đơn giá</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{asset('cart/delete/'.$item->rowId)}}"><img src="img/icon/close-icon.png" alt=""></a>
                                            </th>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img width="100" height="100" src="{{asset('/lib/storage/app/image/product/'.$item->options->img)}}" alt="{{$item->name}}">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4>{{$item->name}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p>{{number_format($item->price,0,',','.')}}</p></td>
                                            <td>
                                                <div class="quantity">
                                                    <div class="custom">
                                                        <button onclick="var result = document.getElementById('{{$item->rowId}}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--; return updateCart(result.value,'{{$item->rowId}}');" class="reduced items-count" type="button"><i class="icon_minus-06"></i></button>
                                                        <input type="text" name="qty" id="{{$item->rowId}}" maxlength="12" value="{{$item->qty}}" title="Quantity:" class="input-text qty" onchange="updateCart(this.value,'{{$item->rowId}}')">
                                                        <button onclick="var result = document.getElementById('{{$item->rowId}}'); var sst = result.value; if( !isNaN( sst )) result.value++;return updateCart(result.value,'{{$item->rowId}}');" class="increase items-count" type="button"><i class="icon_plus"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><p>{{number_format($item->price*$item->qty,0,',','.')}}</p></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="calculate_shoping_area">
                            <a href="{{asset('cart/delete/all')}}" type="button" class="btn btn-primary checkout_btn">Xóa giỏ hàng</a>
                        </div>
                        <!-- <div class="calculate_shoping_area">
                            <h3 class="cart_single_title">Phí giao hàng <span><i class="icon_minus-06"></i></span></h3>
                            <div class="calculate_shop_inner">
                                <form class="calculate_shoping_form row" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="form-group col-lg-12">
                                        <select class="selectpicker">
                                            <option>United State America (USA)</option>
                                            <option>United State America (USA)</option>
                                            <option>United State America (USA)</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <button type="submit" value="submit" class="btn submit_btn form-control">update totals</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-4">
                        <div class="total_amount_area">
                            <!-- <div class="cupon_box">
                                <h3 class="cart_single_title">Phiếu giảm giá</h3>
                                <div class="cupon_box_inner">
                                    <input type="text" placeholder="Enter your code here">
                                    <button type="submit" class="btn btn-primary subs_btn">apply cupon</button>
                                </div>
                            </div> -->
                            <div class="cart_totals">
                                <h3 class="cart_single_title">Thanh toán</h3>
                                <div class="cart_total_inner">
                                    <ul>
                                        <!-- <li><a href="#"><span>Thành tiền</span> {{$total}} VNĐ</a></li> -->
                                        <!-- <li><a href="#"><span>Shipping</span> Free</a></li> -->
                                        <li><a href="#"><span>Tổng tiền</span> {{$total}} VNĐ</a></li>
                                    </ul>
                                </div>
                                <a type="button" href="{{asset('cart/show')}}" class="btn btn-primary update_btn">Cập nhật</a>
                                <a type="button" href="{{asset('cart/checkout')}}" class="btn btn-primary checkout_btn">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Shopping Cart Area =================-->
        <script type="text/javascript">
            function updateCart(qty, id){
                $.get(
                    '{{asset("cart/update")}}',
                    {qty:qty,id:id},
                    function(){
                        location.reload();
                    }
                );
            }
        </script>
 @stop