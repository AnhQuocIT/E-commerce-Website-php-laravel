<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="{{asset('public/backend')}}/">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Admin - Register</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
    </head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Đăng ký tài khoản quản trị</div>
      <div class="card-body">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
        @endif
        <form method="post" accept-charset="utf-8" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="name" name="name" class="form-control" placeholder="Họ tên" required="required" value="{{ old('name') }}">
              <label for="name">Họ Tên</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Địa chỉ email" required="required" value="{{ old('inputEmail') }}">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <select name="level" id="level" class="form-control" required>
                <option value="" disabled selected hidden>-- Chọn cấp độ quản trị --</option>
                <option value="admin">Admin</option>
                <option value="mod">Mod</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password" required="required">
                  <label for="password_confirmation">Nhập lại password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" href="">Đăng ký</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="{{asset('admin/login')}}">Trang đăng nhập</a>
          <a class="d-block small" href="{{ route('password.request') }}">Quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
