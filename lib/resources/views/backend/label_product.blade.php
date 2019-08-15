@extends('backend.master')
@section('title','Label')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Label</li>
    </ol>
    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách hãng sản phẩm
            <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm mới hãng</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="35%">Tên hãng</th>
                            <th>Hình ảnh</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên hãng</th>
                            <th>Hình ảnh</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($productLabelList as $prodLabel)
                        <tr>
                        <td>{{$prodLabel->name}}</td>
                            <td>
                                <img width="200px" src="{{asset('lib/storage/app/image/productLabel/'.$prodLabel->image)}}" alt="{{$prodLabel->name}}" class="thumbnail">
                            </td>
                            <td>
                                <a href="{{asset('admin/product-label/edit/'.$prodLabel->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/product-label/delete/'.$prodLabel->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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
<div class="modal" id="myModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hãng sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    @include('error.note')
                    <div class="form-group">
                        <label for="txtCateName">Tên hãng</label>
                        <input type="text" name="txtCateName" class="form-control" id="txtCateName">
                    </div>
                    <div class="form-group">
                        <label for="txtCateImg">Hình ảnh</label>
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