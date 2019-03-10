@extends('backend.master')
@section('title','Slide')
@section('main')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Slide</li>
    </ol>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách Slide - Banner
            <a style="float: right;" href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success"><i class="fas fa-folder-plus"></i> Thêm slide - Banner</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="35%">Slide - Banner</th>
                            <th>Đường dẫn (link)</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Slide - Banner</th>
                            <th>Đường dẫn (link)</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
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
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="#" method="post" accept-charset="utf-8">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Slide - Banner</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                    	<label for="txtSlideImg">Slide - Banner</label>
                        <input type="file" name="txtSlideImg" class="form-control-file" id="txtSlideImg">
                    </div>
                    <div class="form-group">
                        <label for="txtSlideLink">Đường dẫn (link)</label>
                        <input type="text" name="txtSlideLink" class="form-control" id="txtSlideLink">
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