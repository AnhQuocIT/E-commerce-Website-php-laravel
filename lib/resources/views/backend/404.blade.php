@extends('backend.master')
@section('title','Page not found')
@section('main')
      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Trang chủ</a>
          </li>
          <li class="breadcrumb-item active">404 Error</li>
        </ol>

        <!-- Page Content -->
        <h1 class="display-1">404</h1>
        <p class="lead">Page not found. You can
          <a href="javascript:history.back()">go back</a>
          to the previous page, or
          <a href="{{asset('admin/home')}}">return home</a>.</p>

      </div>
      <!-- /.container-fluid -->
  @stop
