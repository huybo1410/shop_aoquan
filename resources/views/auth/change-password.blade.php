@extends('layouts.client')
@section('content-client')
<div class="container_fullwidth content-page">
    <div class="container">
        <div class="col-md-12 container-page">
            <div class="checkout-page">
              <ol class="checkout-steps">
                <li class="steps active">
                  <h4 class="title-steps text-center">
                    Đổi Mật Khẩu Mới
                  </h4>
                  <div class="step-description">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <div class="run-customer">
                            <div id="form-data" hidden data-rules="{{ json_encode($rules) }}"
                          data-messages="{{ json_encode($messages) }}"></div>
                          <form action="{{ route('user.change_new_password') }}" method="POST" id="form__js">
                            <input type="text" value="{{ $token }}" hidden name="token">
                            @csrf
                            <div class="form-group">
                              <label for="exampleInputEmail1">Mật Khẩu Mới</label>
                              <div class="password-container">
                                <input type="password" class="form-control" value="{{ old('password') }}" id="password" name="password" placeholder="Nhập mật khẩu mới">
                                <span class="toggle-password" onclick="togglePassword()">Hiển thị</span>
                             </div>
                              @if ($errors->get('password'))
                                <span id="password-error" class="error invalid-feedback" style="display: block">
                                  {{ implode(", ",$errors->get('password')) }}
                                </span>
                              @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Xác Nhận Mật Khẩu Mới</label>
                                <div class="password-container">
                                  <input type="password" class="form-control" value="{{ old('password_confirm') }}" id="password_confirm" name="password_confirm" placeholder="Xác nhận mật khẩu mới">
                                  <span class="toggle-password" onclick="togglePassword1()">Hiển thị</span>
                               </div>
                                @if ($errors->get('password_confirm'))
                                  <span id="password_confirm-error" class="error invalid-feedback" style="display: block">
                                    {{ implode(", ",$errors->get('password_confirm')) }}
                                  </span>
                                @endif
                              </div>
                            <div class="text-center">
                                <button>
                                  Đổi Mật Khẩu
                                </button>
                            </div>
                            <div class="content-footer">
                                <a href="{{ route('user.login') }}">
                                  Quay lại trang đăng nhập
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
@vite(['resources/client/js/register.js'])
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
  function togglePassword1() {
      var passwordField = document.getElementById("password_confirm");
      var togglePasswordButton = document.querySelector(".toggle-password1");
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