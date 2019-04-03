@extends('backend.master')
@section('title','Products')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{asset('admin/products')}}">Products</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

		
    <div class="card mb3">
        <div class="card-header">
            <i class="fas fa-edit"></i>
            Chỉnh sửa sản phẩm "{{$prodById->name}}"
        </div>
        @include('error.note')
        <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="txtProdName">Tên sản phẩm</label>
                        <input value="{{$prodById->name}}" type="text" name="txtProdName" class="form-control" id="txtProdName">
                    </div>
                    <div class="form-group">
                        <label for="txtCate">Danh mục</label>
                        <select name="txtCate" id="txtCate" class="form-control">
                        @foreach($typeList as $type)
                            <option value="{{$type->id}}" @if($prodById->id_type == $type->id) selected @endif>{{$type->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtLabel">Hãng</label>
                        <select name="txtLabel" id="txtLabel" class="form-control">
                        @foreach($labelList as $label)
                            <option value="{{$label->id}}" @if($prodById->label_id == $label->id) selected @endif>{{$label->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtUnitPrice">Giá bán</label>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input value="{{$prodById->unit_price}}" type="text" placeholder="ex: 1,000" min="0" data-type="currency" data-type="currency" name="txtUnitPrice" class="form-control" id="txtUnitPrice">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="txtProPrice">Giá khuyến mãi</label>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input value="{{$prodById->promotion_price}}" type="text" placeholder="ex: 1,000" min="0" data-type="currency" data-type="currency" name="txtProPrice" class="form-control" id="txtProPrice">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtProdDesc">Mô tả</label>
                        <textarea name="txtProdDesc" class="ckeditor" id="txtProdDesc">{{$prodById->description}}</textarea>
                        <script type="text/javascript">
                            var editor = CKEDITOR.replace('txtProdDesc',{
                                language:'en',
                                filebrowserImageBrowseUrl: '../editor/ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl: '../editor/ckfinder/ckfinder.html?Type=Flash',
                                filebrowserImageUploadUrl: '../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '../editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label for="chooseImg">Ảnh sản phẩm</label><br>
                        <input id="chooseImg" type="file" name="chooseImg" onchange="changeImg(this)">
                        <img id="avatar" class="thumbnail" width="200px" src="{{asset('/lib/storage/app/image/product/'.$prodById->image)}}">
                    </div>
                    <div class="form-group">
                        <label for="listImg">Ảnh sản phẩm +</label><br>
                        <input id="listImg" type="file" name="listImg[]" multiple>
                        @if($listImage != null)
                            @foreach($listImage as $img)
                                <img width="15%" height="15%" src="{{asset('/lib/storage/app/image/product/'.$img)}}" alt="{{$prodById->name}}">
                            @endforeach
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="txtProdOrigin">Xuất sứ</label>
                        <input value="{{$prodById->origin}}" type="text" name="txtProdOrigin" class="form-control" id="txtProdOrigin">
                    </div>
                    <div class="form-group">
                        <label for="cbProdPromotion">Khuyến mãi?</label>
                        <input width="50px" name="cbProdPromotion" type="checkbox" @if($prodById->is_sale == true) checked @endif data-toggle="toggle">
                    </div>
                    <div class="form-group">
                        <label for="cbProdNew">Hàng mới?</label>
                        <input name="cbProdNew" type="checkbox" @if($prodById->new == true) checked @endif data-toggle="toggle">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                <a href="{{asset('admin/products')}}" class="btn btn-danger">Hủy bỏ</a>
            </div>
        </form>
    </div>
</div>

@stop

