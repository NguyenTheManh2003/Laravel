@extends('frontend.layout.master')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-10 col-xl-9 mx-auto">
      <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden">
        <div class="card-img-left d-none d-md-flex">
          <!-- Background image for card set in CSS! -->
        </div>
        <div class="card-body p-4 p-sm-5">

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <h5 class="card-title text-center mb-5 fw-light fs-5">Đăng ký tài khoản</h5>
          <form action="{{route('reg.create')}}" method="post">
            @csrf

            <div class="form-floating mb-3">
              <label for="floatingInputUsername">Họ tên</label>
              <input type="text" class="form-control" id="inputHoTen" name="name" placeholder="Họ và tên">
            </div>
            <div class="form-floating mb-3">
              <label for="floatingInputEmail">Địa chỉ email</label>
              <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Địa chỉ email">
            </div>
            <div class="form-floating mb-3">
              <label for="floatingInputUsername">Điện thoại</label>
              <input type="text" class="form-control" id="inputDienThoai" name="phone" placeholder="Số điện thoại">
            </div>
            <div class="form-floating mb-3">
              <label for="floatingInputUsername">Địa chỉ</label>
              <input type="text" class="form-control" id="inputDiaChi" name="address" placeholder="Địa chỉ">
            </div>
            <div class="form-floating mb-3">
              <label for="floatingInputUsername">Tỉnh/TP</label>
              <input type="text" class="form-control" id="inputTinh" name="province" placeholder="Tên Tỉnh/TP">
            </div>
            <hr>
            <div class="form-floating mb-3">
              <label for="floatingPassword">Mật khẩu</label>
              <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Mật khẩu">
            </div>

            <div class="form-floating mb-3">
              <label for="floatingPasswordConfirm">Xác nhận lại mật khẩu</label>
              <input type="password" class="form-control" id="inputPasswordConfirm" name="password_confirmation" placeholder="Xác nhận lại mật khẩu">
            </div>

            <div class="d-grid mb-2">
              <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="submit">Đăng ký</button>
            </div>

            <a class="d-block text-center mt-2 small" href="{{route('login')}}">Tôi đã có tài khoản</a>
            <hr class="my-4">
          </form>
</div>
      </div>
    </div>
  </div>
</div>
@stop