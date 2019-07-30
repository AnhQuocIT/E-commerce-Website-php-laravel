@extends('fontend.master')
@section('title','Đăng nhập')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Login</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li><a href="{{asset('log-in')}}">Login</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--================End Categories Banner Area =================-->
        
        <!--================login Area =================-->
        <section class="login_area p_100">
            <div class="container">
                <div class="login_inner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="login_title">
                                <h2>Đăng nhập tài khoản</h2>
                                
                            </div>
                            @if(Session::has('error'))
                                <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif
                            <form class="login_form row" action="{{asset('log-in')}}" method="post">
                                {{ csrf_field() }}
                                <div class="col-lg-12 form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="pass">
                                </div>
                                <div class="col-lg-12 form-group">
                                    <a href="#"><h4>Quên mật khẩu?</h4></a>
                                </div>
                                <div class="col-lg-12 form-group">
                                    <button type="submit" name="submit" class="btn update_btn form-control">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-8">
                            <div class="login_title">
                                <h2>tạo tài khoản mới</h2>
                            </div>
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{$error}} <br>
                                    @endforeach
                                </div>
                            @endif
                            @if(Session::has('Success'))
                                <div class="alert alert-success">{{Session::get('Success')}}</div>
                            @endif
                            <form class="login_form row" action="{{asset('sign-in')}}" method="post">
                                {{ csrf_field() }}
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Name" name="name">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Address" name="address">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="number" placeholder="Phone" name="phone">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="pass">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="password" placeholder="Re-Password" name="repass">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button type="submit" name="submit" class="btn subs_btn form-control">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
        @stop