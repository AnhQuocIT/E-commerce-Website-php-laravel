@extends('backend.master')
@section('title','Khách thành viên')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Members</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách thành viên
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
                            <th>Mật khẩu</th>
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
                            <th>Mật khẩu</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($memberList as $member)
                        <tr>
                            <td>{{$member->name}}</td>
                            <td>
                                @if($member->gender == true)
                                    Nam
                                @else
                                    Nữ
                                @endif
                            </td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->address}}</td>
                            <td>{{$member->phone_number}}</td>
                            <td>{{$member->password}}</td>
                            <td>
                                <a href="{{asset('admin/member/edit/'.$member->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/member/delete/.$member->id')}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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