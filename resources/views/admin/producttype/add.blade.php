@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="producttype">Name Product type </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label>Status </label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="status">
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="0" id="no_active" name="status">
                <label for="no_active" class="custom-control-label">No</label>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Product Type</button>
        </div>
        @csrf
    </form>
@endsection

