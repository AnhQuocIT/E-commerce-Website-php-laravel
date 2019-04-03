@extends('backend.master')
@section('title','Bills')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{asset('admin/bill-waiting')}}">Bills</a>
        </li>
        <li class="breadcrumb-item active">Details</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Chi tiết của hóa đơn <strong>"{{$customerName->id}}"</strong> 
            của <strong>"{{$customerName->name}}"</strong> 
            đặt ngày <strong>"{{$customerName->date_order}}"</strong>
            <!-- <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm mới danh mục</a> -->
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($billDetailList as $bill)
                        <tr>
                            <td>{{$bill->name}}</td>
                            <td>{{$bill->quantity}}</td>
                            <td>{{number_format($bill->unit_price,0,',','.')}} VNĐ</td>
                            <td>
                                <a href="{{asset('admin/bill-waiting/deleteDetail/'.$bill->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
<!-- /.container-fluid -->
@stop