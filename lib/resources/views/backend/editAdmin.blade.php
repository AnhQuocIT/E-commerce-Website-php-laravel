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
        <title>Admin - Infomation</title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    </head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Thông tin tài khoản quản trị</div>
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
              <input type="text" id="name" name="name" class="form-control" placeholder="Họ tên" required="required" value="{{ $adminById->name }}">
              <label for="name">Họ Tên</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Địa chỉ email" required="required" value="{{ $adminById->email }}">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <select name="level" id="level" class="form-control" required>
                <option value="admin" {{ $adminById->level === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="mod" {{ $adminById->level === 'mod' ? 'selected' : '' }}>Mod</option>
              </select>
            </div>
          </div>

          <div class="form-check">
              <input type="checkbox" class="form-check-input" id="changePass" name="changePass">
              <label class="form-check-label" for="changePass">Thay đổi mật khẩu?</label>
          </div>
          <br>
          <div class="form-group pass" style="display:none">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password"  required="required">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm password"  required="required">
                  <label for="password_confirmation">Nhập lại password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block" href="">Lưu thay đổi</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="javascript:history.back()">Quay về</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#changePass').click(function(){
            $(".pass").toggle();
        });
    });
  </script>
</body>

</html>
