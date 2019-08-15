@extends('backend.master')
@section('title','Products')
@section('main')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{asset('admin/home')}}">Dashboard</a>
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
                @include('error.note')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hãng</th>
                            <th>Giá bán</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ảnh sản phẩm</th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hãng</th>
                            <th>Giá bán</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ảnh sản phẩm</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($prodList as $prod)
                        <tr>
                            <td>{{$prod->id}}</td>
                            <td>{{$prod->name}}</td>
                            <td>{{$prod->typeName}}</td>
                            <td>{{$prod->labelName}}</td>
                            <td>{{number_format($prod->unit_price,0,',','.')}} VNĐ</td>
                            <td>{{number_format($prod->promotion_price,0,',','.')}} VNĐ</td>
                            <td><img width="200px" src="{{asset('lib/storage/app/image/product/'.$prod->image)}}" alt="{{$prod->name}}" class="thumbnail"></td>
                            <td>
                                <a href="{{asset('admin/products/edit/'.$prod->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Sửa</a>
                                <a href="{{asset('admin/products/delete/'.$prod->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Xóa</a>
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
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <form method="post" id="productForm" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới sản phẩm</h4>
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
                        @foreach($typeList as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtLabel">Hãng</label>
                        <select name="txtLabel" id="txtLabel" class="form-control">
                        @foreach($labelList as $label)
                            <option value="{{$label->id}}">{{$label->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="txtUnitPrice">Giá bán</label>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input type="text" placeholder="ex: 1,000" min="0" data-type="currency" data-type="currency" name="txtUnitPrice" class="form-control" id="txtUnitPrice">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="txtProPrice">Giá khuyến mãi</label>
                        <div class="input-group mb3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input type="text" placeholder="ex: 1,000" min="0" data-type="currency" data-type="currency" name="txtProPrice" class="form-control" id="txtProPrice">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtMiniDesc">Mô tả sơ lược</label>
                        <textarea name="txtMiniDesc" rows="4" class="form-control" id="txtMiniDesc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="txtProdDesc">Mô tả</label>
                        <textarea name="txtProdDesc" class="ckeditor" id="txtProdDesc"></textarea>
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
                        <input required id="chooseImg" type="file" name="chooseImg" onchange="changeImg(this)">
					    <img id="avatar" class="thumbnail" width="200px" src="../backend/img/choose-image.png">
                    </div>
                    <div class="form-group">
                        <label for="listImg">Ảnh sản phẩm +</label><br>
                        <input required id="listImg" type="file" name="listImg[]" multiple>
                    </div>
                    <div class="form-group">
                        <label for="txtProdOrigin">Xuất sứ</label>
                        <input value="Hàn quốc" type="text" name="txtProdOrigin" class="form-control" id="txtProdOrigin">
                    </div>
                    <div class="form-group">
                        <label for="cbProdPromotion">Khuyến mãi?</label>
                        <input name="cbProdPromotion" type="checkbox" checked data-toggle="toggle">
                    </div>
                    <div class="form-group">
                        <label for="cbProdNew">Hàng mới?</label>
                        <input name="cbProdNew" type="checkbox" checked data-toggle="toggle">
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