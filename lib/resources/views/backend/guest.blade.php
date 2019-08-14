@extends('backend.master')
@section('title','Khách vãn lai')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Customers</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách khách hàng
            <!-- <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm mới danh mục</a> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Họ tên</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Điện thoại</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($guestList as $guest)
                        <tr>
                            <td>{{$guest->name}}</td>
                            <td>
                                @if($guest->gender == true)
                                    Nam
                                @else
                                    Nữ
                                @endif
                            </td>
                            <td>{{$guest->email}}</td>
                            <td>{{$guest->address}}</td>
                            <td>{{$guest->phone_number}}</td>
                            <td>
                                <a href="{{asset('admin/customer/edit/'.$guest->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/customer/delete/'.$guest->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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