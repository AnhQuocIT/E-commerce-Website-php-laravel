@extends('fontend.master')
@section('title','Đăng nhập')
@section('main')
        <!--================Categories Banner Area =================-->
        <section class="solid_banner_area">
            <div class="container">
                <div class="solid_banner_inner">
                    <h3>Thông tin tài khoản</h3>
                    <ul>
                        <li><a href="{{asset('/')}}">Trang chủ</a></li>
                        <li><a href="{{asset('log-in')}}">Thông tin</a></li>
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
                        <div class="col-lg-12">
                            <div class="login_title">
                                <h2>thông tin tài khoản</h2>
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
                            <form class="login_form row" method="post">
                                {{ csrf_field() }}
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Name" name="name" value="{{$cusById->name}}">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="email" placeholder="Email" name="email" value="{{$cusById->email}}">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="text" placeholder="Address" name="address" value="{{$cusById->address}}">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input class="form-control" type="number" placeholder="Phone" name="phone" value="{{$cusById->phone_number}}">
                                </div>
                                <div class="col-lg-12 form-check">
                                    <input type="checkbox" class="form-check-input" id="enable_change">
                                    <label for="enable_change">Thay đổi mật khẩu?</label>
                                </div>
                                <div id="change_pass" class="col-lg-12 form-group">
                                    <div class="col-lg-12 form-group">
                                        <input class="form-control" type="password" placeholder="Password" name="pass">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <input class="form-control" type="password" placeholder="Re-Password" name="repass">
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <button type="submit" name="submit" class="btn subs_btn form-control">Lưu thông tin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End login Area =================-->
        @stop