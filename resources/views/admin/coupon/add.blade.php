@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Code</label>
                        <input type="text" name="code" value="{{ old('code') }}" class="form-control"  placeholder="Enter Code">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Discount</label>
                        <input type="text" name="discount" value="{{ old('discount') }}" class="form-control"  placeholder="Enter Discount (%)">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Times Used</label>
                        <input type="number" name="times_used" value="{{ old('times_used') }}"  class="form-control" placeholder="Enter Times Used">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Is Active</label>
                        <input type="number" name="is_active" value="{{ old('is_active') }}"  class="form-control" placeholder="">
                    </div>
                </div>
            </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Coupon</button>
        </div>
        @csrf
    </form>
@endsection

