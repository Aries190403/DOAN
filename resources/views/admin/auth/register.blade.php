@extends('admin.main')


@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="Enter Username">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">

                    <input type="password" class="form-control" value="{{ old('password_confirmation') }}" id="password_confirm" name="password_confirmation" placeholder="Confirm password">
                    @if ($errors->get('password_confirmation'))
                    <span class="error invalid-feedback" style="display: block; color:red">
                        {{ implode(", ", $errors->get('password_confirmation')) }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" value="{{ old('fullName') }}" class="form-control" placeholder="Enter Full Name">
        </div>

        <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="tel" name="phoneNumber" value="{{ old('phoneNumber') }}" class="form-control" placeholder="Enter Phone Number">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
        </div>

        <div class="col-md-6">
            <label for="isAdmin">Is Admin</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="isAdmin_yes" name="isAdmin" checked>
                <label for="isAdmin_yes" class="custom-control-label">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="isAdmin_no" name="isAdmin">
                <label for="isAdmin_no" class="custom-control-label">No</label>
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
    @csrf
</form>

@endsection