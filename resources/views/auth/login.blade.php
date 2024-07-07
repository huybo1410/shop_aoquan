@extends('layouts.client')
@section('content-client')
<div class="container_fullwidth content-page">
    <div class="container">
        <div class="col-md-12 container-page">
            <div class="checkout-page">
              <ol class="checkout-steps">
                <li class="steps active">
                  <h4 class="title-steps text-center">
                    Đăng Nhập
                  </h4>
                  <div class="step-description">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="run-customer">
                          <form action="{{ route('user.login') }}" method="POST" id="login-form__js">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Nhập email">
                              @if ($errors->get('email'))
                                <span id="email-error" class="error invalid-feedback" style="display: block">
                                  {{ implode(", ",$errors->get('email')) }}
                                </span>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Mật Khẩu</label>
                              <div class="password-container">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                                <span class="toggle-password" onclick="togglePassword()">Hiển thị</span>
                            </div>
                              {{-- <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu"> --}}
                              @if ($errors->get('password'))
                                <span id="password-error" class="error invalid-feedback" style="display: block">
                                  {{ implode(", ",$errors->get('password')) }}
                                </span>
                              @endif
                            </div>
                            <div class="text-center">
                                <button>
                                  Đăng Nhập
                                </button>
                            </div>
                            <div class="content-footer">
                                <a href="{{ route('user.forgot_password_create') }}">
                                  Quên mật khẩu,
                                </a>
                                <a href="{{ route('user.register') }}">
                                  Đăng kí tài khoản
                                </a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </ol>
            </div>
          </div>
    </div>
</div>
@vite(['resources/common/js/login.js'])
<style>
  .password-container {
      position: relative;
  }
  .toggle-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
  }
</style>
<script>
  function togglePassword() {
      var passwordField = document.getElementById("password");
      var togglePasswordButton = document.querySelector(".toggle-password");
      if (passwordField.type === "password") {
          passwordField.type = "text";
          togglePasswordButton.textContent = "Ẩn";
      } else {
          passwordField.type = "password";
          togglePasswordButton.textContent = "Hiển thị";
      }
  }
</script>
@endsection