<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.header')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>

{{-- sidebar --}}
  @include('admin.sidebar')
{{-- /sidebar --}}
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">

         @include('admin.alert')         {{-- thêm thông báo bẫy lỗi --}}

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary mt-3">
              <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
              </div>
                @yield('content')
            </div>
            </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
  </div>
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Tandat</b>
    </div>
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">TanDat</a>.</strong> All rights reserved.
  </footer>
    <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
 {{-- footer --}}
    @include('admin.footer')
{{-- /footer --}}
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
