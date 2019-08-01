@extends('backend.master')
@section('title','Danh sách quản trị')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách quản trị
            <a style="float: right;" href="{{asset('admin/admin-control/register')}}" class="btn btn-success"><i class="fas fa-folder-plus"></i> Đăng ký nhà quản trị</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Cấp độ</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Cấp độ</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($adminList as $admin)
                        <tr>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email}}</td>
                            <td>{{$admin->level}}</td>
                            <td>
                                <a href="{{asset('admin/admin-control/edit/'.$admin->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/admin-control/delete/'.$admin->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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