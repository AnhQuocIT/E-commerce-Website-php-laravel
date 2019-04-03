@extends('backend.master')
@section('title','Bills')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Bills</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách hóa đơn
            <!-- <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm mới danh mục</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                            <th>Ghi chú</th>
                            <th></th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Hình thức thanh toán</th>
                            <th>Ghi chú</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($billList as $bill)
                        <tr>
                            <td>{{$bill->name}}</td>
                            <td>{{$bill->date_order}}</td>
                            <td>{{number_format($bill->total,0,',','.')}} VNĐ</td>
                            <td>{{$bill->payment}}</td>
                            <td>{{$bill->note}}</td>
                            <td><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-check"></i> Thanh toán</a></td>
                            <td>
                                <a href="{{asset('admin/bill-waiting/detail/'.$bill->id)}}" class="btn btn-warning"><i class="fas fa-eye"></i> Xem</a>
                                <a href="{{asset('admin/bill-waiting/delete/'.$bill->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
<!-- /.container-fluid -->
@stop