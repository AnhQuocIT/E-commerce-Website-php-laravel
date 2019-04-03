@extends('backend.master')
@section('title','Customers')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{asset('admin/customer')}}">Customer</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

		
    <div class="card mb3">
        <div class="card-header">
            <i class="fas fa-edit"></i>
            Chỉnh sửa khách hàng "{{$guestById->name}}"
        </div>
        @include('error.note')
        <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
            <div class="card-body">
                <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="form-group">
                        <label for="txtMemberName">Tên thành viên</label>
                        <input type="text" name="txtMemberName" class="form-control" id="txtMemberName" value="{{$guestById->name}}">
                    </div>
                    <div class="form-group">
                        <label for="txtMemberSex">Giới tính</label>
                        &nbsp;&nbsp;
                        <div class="form-check-inline">
                          <label class="form-check-label">
                            <input type="radio" name="txtMemberSex" class="form-check-input" id="txtMemberName" <?php echo ($guestById->gender == 1) ? 'checked' : ''?> value="1">Nam
                          </label>
                          &nbsp;&nbsp;
                          <label class="form-check-label">
                            <input type="radio" name="txtMemberSex" class="form-check-input" id="txtMemberName" <?php echo ($guestById->gender == 0) ? 'checked' : ''?> value="0">Nữ
                          </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtMemberEmail">Email</label>
                        <input type="text" name="txtMemberEmail" class="form-control" id="txtMemberEmail" value="{{$guestById->email}}">
                    </div>
                    <div class="form-group">
                        <label for="txtMemberAddress">Địa chỉ</label>
                        <input type="text" name="txtMemberAddress" class="form-control" id="txtMemberAddress" value="{{$guestById->address}}">
                    </div>
                    <div class="form-group">
                        <label for="txtMemberPhone">Điện thoại</label>
                        <input type="text" name="txtMemberPhone" class="form-control" id="txtMemberPhone" value="{{$guestById->phone_number}}">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="{{asset('admin/customer')}}" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>

@stop

