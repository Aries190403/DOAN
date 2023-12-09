<!DOCTYPE html>
<html lang="en">
<head>
    {{-- @include('admin.header') --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box" style="">
  <div class="register-logo">
  </div>
  <div class="card">
    <div class="card-body register-card-body col-md-4">
      <p class="register-box-msg">Register an Account</p>
        {{-- @include('admin/alert') --}}
      <form action="{{ route('register') }}" method="POST" id="form__js">
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ old('username') }}" id="username" name="username" placeholder="Enter username">
          @if ($errors->get('username'))
              <span class="error invalid-feedback" style="display: block">
                  {{ implode(", ", $errors->get('username')) }}
              </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Enter email">
          @if ($errors->get('email'))
              <span class="error invalid-feedback" style="display: block; color:red">
                  {{ implode(", ", $errors->get('email')) }}
              </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" value="{{ old('password') }}" id="password" name="password" placeholder="Enter password">
          @if ($errors->get('password'))
              <span class="error invalid-feedback" style="display: block; color:red">
                  {{ implode(", ", $errors->get('password')) }}
              </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" value="{{ old('password_confirmation') }}" id="password_confirm" name="password_confirmation" placeholder="Confirm password">
          @if ($errors->get('password_confirmation'))
              <span class="error invalid-feedback" style="display: block; color:red">
                  {{ implode(", ", $errors->get('password_confirmation')) }}
              </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ old('fullName') }}" id="fullName" name="fullName" placeholder="Enter full name">
          @if ($errors->get('fullName'))
              <span class="error invalid-feedback" style="display: block; color:red">
                  {{ implode(", ", $errors->get('fullName')) }}
              </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ old('phoneNumber') }}" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
          @if ($errors->get('phoneNumber'))
              <span class="error invalid-feedback" style="display: block; color:red">
                  {{ implode(", ", $errors->get('phoneNumber')) }}
              </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" value="{{ old('address') }}" id="address" name="address" placeholder="Enter address">
          @if ($errors->get('address'))
              <span class="error invalid-feedback" style="display: block; color:red">
                  {{ implode(", ", $errors->get('address')) }}
              </span>
          @endif
        </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
        @csrf
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>

      <p class="mb-0">Already have an account ?
        <a href="{{ route('login') }}" class="text-center"> Log in</a>
      </p>
    </div>
  </div>
</div>
    {{-- @include('admin.footer') --}}
</body>
</html>
