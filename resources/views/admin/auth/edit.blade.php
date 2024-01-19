@extends('admin.main')


@section('content')
<form action="" method="POST" enctype="multipart/form-data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 form-group">
                <img src="/template/admin/dist/img/user2-160x160.jpg" alt="AVATAR" width="100px" height="100px" style="border-radius: 50%; border: solid 1px;">
                {{--<input type="file" class="form-control" name="avatar">--}}
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="{{ $account->username }}" class="form-control" placeholder="Enter Username">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" value="{{ $account->password}}" placeholder="Enter Password">

                    <input type="text" class="form-control" value="{{ $account->password }}" id="password_confirm" name="password_confirmation" placeholder="Confirm password">
                    @if ($errors->get('password_confirmation'))
                    <span class="error invalid-feedback" style="display: block; color:red">
                        {{ implode(", ", $errors->get('password_confirmation')) }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $account->email }}" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group col-md-6">
                <label for="fullName">Full Name</label>
                <input type="text" name="fullName" value="{{ $account->fullName }}" class="form-control" placeholder="Enter Full Name">
            </div>
        </div>
        <div style="display: flex;">

            <div class="form-group col-md-6">
                <label for="phoneNumber">Phone Number</label>
                <input type="tel" name="phoneNumber" value="{{ $account->phoneNumber }}" class="form-control" placeholder="Enter Phone Number">
            </div>

            <div class="form-group col-md-6">
                <label for="address">Address</label>
                <textarea name="address" class="form-control">{{ $account->address }}</textarea>
            </div>
        </div>
        <div style="display: flex;">
            <div class="col-md-4">
                <label for="isAdmin">Is Admin</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" {{ $account->isAdmin == 1 ? 'checked' : '' }} type="radio" id="isAdmin_yes" name="isAdmin" value="1">
                    <label for="isAdmin_yes" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" {{ $account->isAdmin == 0 ? 'checked' : '' }} type="radio" id="isAdmin_no" name="isAdmin" value="0">
                    <label for="isAdmin_no" class="custom-control-label">No</label>
                </div>
            </div>


            <div class="col-md-4">
                <label for="status">Status</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="status_yes" name="status" {{$account->status == 1 ? 'checked' : ''}}>
                    <label for="status_yes" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="status_no" name="status" {{$account->status == 0 ? 'checked' : ''}}>
                    <label for="status_no" class="custom-control-label">No</label>
                </div>
            </div>

        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
    @csrf
</form>

@endsection