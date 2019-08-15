<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{asset('public/fontend')}}/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title') | Shop</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/line-icon/css/simple-line-icons.css" rel="stylesheet">
        <link href="vendors/elegant-icon/style.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/bootstrap-selector/css/bootstrap-select.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!--================Top Header Area =================-->
        <div class="header_top_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="top_header_left">
                            <div class="selector">
                                <select class="language_drop" name="countries" id="countries" style="width:300px;">
                                  <option value='yt' data-image="https://img.icons8.com/color/20/000000/vietnam.png" data-imagecss="flag yt" data-title="VN">VN</option>
                                </select>
                            </div>
                            <!-- <select class="selectpicker usd_select">
                                <option>USD</option>
                                <option>$</option>
                                <option>$</option>
                            </select> -->
                            <div class="input-group">
                                <form method="get" role="search" action="{{asset('search/')}}">
                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" name="key">
                                    <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit"><i class="icon-magnifier"></i></button>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="top_header_middle">
                            <a href="{{asset('/')}}"><i class="fa fa-phone"></i> Liên hệ: <span>(+84) 927 931 917</span></a>
                            <a href="{{asset('/')}}"><i class="fa fa-envelope"></i> Email: <span>anhquocpro0206@gmail.com</span></a>
                            <a href="{{asset('/')}}"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="top_right_header">
                            <ul class="header_social">
                                <li><a href="{{asset('/')}}"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="{{asset('/')}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{asset('/')}}"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="{{asset('/')}}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <ul class="top_right">
                                <!-- <li class="search_icon"><a href="#"><i class="icon_piechart icons"></i></a></li> -->
                                @if(Auth::guard('customer')->check())
                                    <li class="user">
                                        <a  href="#" role="button" data-toggle="dropdown">
                                            <i class="icon-user icons"></i> <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>Xin chào, {{Auth::guard('customer')->user()->name}}</li>
                                            <hr>
                                            <li><a href="{{asset('/#sale')}}">Hồ sơ</a></li>
                                            <hr>
                                            <li><a href="{{asset('log-out')}}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                    
                                @else
                                    <li class="user"><a href="{{asset('log-in')}}"><i class="icon-user icons"></i></a></li>
                                @endif
                                <li class="dot"><a href="{{asset('cart/show')}}"><span class="glyphicon glyphicon-time"><i class="icon-handbag icons"></i><mark class="rubberBand">{{Cart::count()}}</mark></span></a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Top Header Area =================-->
        
        <!--================Menu Area =================-->
        <header class="shop_header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown submenu active">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Trang chủ <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a  href="{{asset('/#new')}}">Sản phẩm mới</a></li>
                                    <li class="nav-item"><a href="{{asset('/#sale')}}">Sản phẩm khuyến mãi</a></li>
                                    <li class="nav-item"><a href="{{asset('/#hot')}}">Sản phẩm bán chạy</a></li>
                                </ul>
                            </li>

                            <!-- <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Danh mục <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                @foreach($listCate as $cate)
                                    <li class="nav-item"><a class="nav-link" href="{{asset('categories/'.$cate->id.'/'.$cate->slug)}}">{{$cate->name}}</a></li>
                                @endforeach
                                </ul>
                            </li> -->
                            @foreach($listCate as $cate)
                                @if($cate['parent_id'] == 0)
                                    <li class="nav-item dropdown submenu">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$cate->name}} <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @foreach($listCate as $subcate)
                                                @if($subcate['parent_id'] == $cate['id'])
                                                    <li class="nav-item"><a class="nav-link" href="{{asset('categories/'.$subcate->id.'/'.$subcate->slug)}}">{{$subcate->name}}</a></li>
                                                    <li class="dropdown-submenu">
                                                        <ul class="dropdown-menu">
                                                            @foreach($listCate as $squarecate)
                                                                @if($squarecate['parent_id'] == $subcate['id'])
                                                                    <li class="nav-item"><a class="nav-link" href="{{asset('categories/'.$squarecate->id.'/'.$squarecate->slug)}}">{{$squarecate->name}}</a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                            <li class="nav-item dropdown submenu">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Nhãn hàng <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu">
                                @foreach($listLabel as $label)
                                    <li class="nav-item"><a class="nav-link" href="{{asset('labels/'.$label->id.'/'.$label->slug)}}">{{$label->name}}</a></li>
                                @endforeach
                                </ul>
                            </li> 
                            <li class="nav-item"><a class="nav-link" href="{{asset('contact')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--================End Menu Area =================-->
        
        
        
        <!--================Feature Add Area =================-->
        <!-- <section class="feature_add_area">
            <div class="container">
                <div class="row feature_inner">
                    <div class="col-lg-5">
                        <div class="f_add_item">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-1.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4>Best Summer <br />Collection</h4>
                                <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                            <div class="sale">Sale</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f_add_item right_dir">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-2.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4>Best Summer <br />Collection</h4>
                                <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                            <div class="off">10% off</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="f_add_item">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-3.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--================End Feature Add Area =================-->

        <!--================Main Area =================-->
        @yield('main')
        <!--================Main Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
            <div class="container">
                <div class="footer_widgets">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-6">
                            <aside class="f_widget f_about_widget">
                                <a href="{{asset('/')}}"><img src="img/logo.png" alt=""></a>
                                <!-- <p>Persuit is a Premium PSD Template. Best choice for your online store. Let purchase it to enjoy now</p>
                                <h6>Social:</h6>
                                <ul>
                                    <li><a href="#"><i class="social_facebook"></i></a></li>
                                    <li><a href="#"><i class="social_twitter"></i></a></li>
                                    <li><a href="#"><i class="social_pinterest"></i></a></li>
                                    <li><a href="#"><i class="social_instagram"></i></a></li>
                                    <li><a href="#"><i class="social_youtube"></i></a></li>
                                </ul> -->
                            </aside>
                        </div>
                        <!-- <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_info_widget">
                                <div class="f_w_title">
                                    <h3>Information</h3>
                                </div>
                                <ul>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Delivery information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Help Center</a></li>
                                    <li><a href="#">Returns & Refunds</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_service_widget">
                                <div class="f_w_title">
                                    <h3>Customer Service</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_extra_widget">
                                <div class="f_w_title">
                                    <h3>Extras</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Brands</a></li>
                                    <li><a href="#">Gift Vouchers</a></li>
                                    <li><a href="#">Affiliates</a></li>
                                    <li><a href="#">Specials</a></li>
                                </ul>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-4 col-6">
                            <aside class="f_widget link_widget f_account_widget">
                                <div class="f_w_title">
                                    <h3>My Account</h3>
                                </div>
                                <ul>
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Ordr History</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Newsletter</a></li>
                                </ul>
                            </aside>
                        </div> -->
                    </div>
                </div>
                <div class="footer_copyright">
                    <h5>© <script>document.write(new Date().getFullYear());</script> <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Nguyễn Anh Quốc - Nguyễn Lê Minh Thái</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</h5>
                </div>
            </div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <!-- Extra plugin css -->
        <script src="vendors/counterup/jquery.waypoints.min.js"></script>
        <script src="vendors/counterup/jquery.counterup.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/bootstrap-selector/js/bootstrap-select.min.js"></script>
        <script src="vendors/image-dropdown/jquery.dd.min.js"></script>
        <script src="js/smoothscroll.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/magnify-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/vertical-slider/js/jQuery.verticalCarousel.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script src="js/theme.js"></script>
    </body>
</html>
