@extends('backend.master')
@section('title','Product Types')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product Types</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách danh mục sản phẩm
            <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm mới loại sản phẩm</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            @include('error.note')
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="35%">Tên loại</th>
                            <th>Hình ảnh</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên loại</th>
                            <th>Hình ảnh</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($productTypeList as $prodType)
                        <tr>
                            <td>{{$prodType->name}}</td>
                            <td>
                                <img width="200px" src="{{asset('lib/storage/app/image/productType/'.$prodType->image)}}" alt="{{$prodType->name}}" class="thumbnail">
                            </td>
                            <td>
                                <a href="{{asset('admin/product-type/edit/'.$prodType->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/product-type/delete/'.$prodType->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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
<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Loại sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="txtCateName">Tên loại</label>
                        <input required type="text" name="txtCateName" class="form-control" id="txtCateName">
                    </div>
                    <div class="form-group">
                        <label for="txtCateImg">Hình ảnh</label><br>
                        <input required id="chooseImg" type="file" name="chooseImg" onchange="changeImg(this)">
					    <img id="avatar" class="thumbnail" width="200px" src="../backend/img/choose-image.png">
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