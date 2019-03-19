@extends('backend.master')
@section('title','Guests')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Guest</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách khách vãn lai
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Tiger Nixon</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="#" method="post" accept-charset="utf-8">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Khách vãn lai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtGuestName">Tên khách hàng</label>
                        <input type="text" name="txtGuestName" class="form-control" id="txtGuestName">
                    </div>
                    <div class="form-group">
                        <label for="txtGuestSex">Giới tính</label>
                        &nbsp;&nbsp;
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="txtGuestSex" class="form-check-input" id="txtGuestSex">Nam
                          </label>
                          &nbsp;&nbsp;
                          <label class="form-check-label">
                            <input type="radio" name="txtGuestSex" class="form-check-input" id="txtGuestSex">Nữ
                          </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtGuestEmail">Email</label>
                        <input type="text" name="txtGuestEmail" class="form-control" id="txtGuestEmail">
                    </div>
                    <div class="form-group">
                        <label for="txtGuestAddress">Địa chỉ</label>
                        <input type="text" name="txtGuestAddress" class="form-control" id="txtGuestAddress">
                    </div>
                    <div class="form-group">
                        <label for="txtGuestPhone">Điện thoại</label>
                        <input type="text" name="txtGuestPhone" class="form-control" id="txtGuestPhone">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop