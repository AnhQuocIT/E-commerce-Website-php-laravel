@extends('backend.master')
@section('title','Products')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách sản phẩm
            <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm mới sản phẩm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá bán</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ảnh sản phẩm</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá bán</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ảnh sản phẩm</th>
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
                            <td>System Architect</td>
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
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <form action="#" method="post" id="productForm" accept-charset="utf-8">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtProdName">Tên sản phẩm</label>
                        <input type="text" name="txtProdName" class="form-control" id="txtProdName">
                    </div>
                    <div class="form-group">
                        <label for="txtCate">Danh mục</label>
                        <select name="txtCate" id="txtCate" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtUnitPrice">Giá bán</label>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input type=text placeholder="ex: 1,000" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" min="0" data-type="currency" data-type="currency" name="txtUnitPrice" class="form-control" id="txtUnitPrice">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="txtProPrice">Giá khuyến mãi</label>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input type="text" placeholder="ex: 1,000" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" min="0" data-type="currency" data-type="currency" name="txtProPrice" class="form-control" id="txtProPrice">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtProdDesc">Mô tả</label>
                        <textarea type="text" rows="3" name="txtProdDesc" class="form-control" id="txtProdDesc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtCateImg">Ảnh sản phẩm</label>
                        <input type="file" name="txtCateImg" class="form-control-file" id="txtCateImg">
                    </div>
                    <div class="form-group">
                        <label for="txtProdOrigin">Xuất sứ</label>
                        <input type="text" name="txtProdOrigin" class="form-control" id="txtProdOrigin">
                    </div>
                    <div class="form-group">
                        <label for="txtProdOrigin">Khuyến mãi?</label>
                        <input type="checkbox" checked data-toggle="toggle">
                    </div>
                    <div class="form-group">
                        <label for="txtProdOrigin">Hàng mới?</label>
                        <input type="checkbox" checked data-toggle="toggle">
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