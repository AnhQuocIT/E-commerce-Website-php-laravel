@extends('backend.master')
@section('title','Slide')
@section('main')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
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
                        @foreach($slideList as $slide)
                        <tr>
                            <td><img width="200px" src="{{asset('lib/storage/app/image/slide/'.$slide->image)}}" alt="{{$slide->image}}" class="thumbnail"></td>
                            <td>{{$slide->link}}</td>
                            <td>
                                <a href="{{asset('admin/slide/edit/'.$slide->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/slide/delete/'.$slide->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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
<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Slide - Banner</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                    	<label for="chooseImg">Slide - Banner</label>
                        <input required id="chooseImg" type="file" name="chooseImg" onchange="changeImg(this)">
					    <img id="avatar" class="thumbnail" width="200px" src="../backend/img/choose-image.png">
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