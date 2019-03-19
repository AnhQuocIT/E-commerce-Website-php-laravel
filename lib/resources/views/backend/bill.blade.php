@extends('backend.master')
@section('title','Bills')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Tiger Nixon</td>
                            <td><a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fas fa-check"></i> Thanh toán</a></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-warning"><i class="fas fa-eye"></i> Xem</a>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="#" method="post" accept-charset="utf-8">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Chi tiết hóa đơn</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Hóa đơn của khách hàng {tên khách hàng}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th width="10%"></th>
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Tiger Nixon</td>
                            <td>
                                <a href="#" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop