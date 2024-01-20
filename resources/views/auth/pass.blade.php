@extends('main')
@section('content')
<div class="container p-t-80">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            <a href="/profile" class="stext-109 cl8 hov-cl1 trans-04">
                Coza Profile
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>
        </span>

        <span class="stext-109 cl4">
            <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
                Edit Password
            </a>
        </span>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert-danger').fadeOut();
            }, 4000);
        });
    </script>
    @endif
    @foreach($account as $user)
    <div class="container">
        <div class="main-body">
            <form action="#" method="post">
                @csrf

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>{{ $user->fullName }}</h4>
                                        <button class="btn btn-outline-primary">Change Photo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Old Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control" name="old_password" placeholder="Enter old password" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">New Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="password" class="form-control" placeholder="Enter new password" required>
                                    </div>
                                </div>
                                <hr>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info">Save Changes</button>
                                        <a href="#">Forgot password ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach

</div>
</div>
</div>
@endsection