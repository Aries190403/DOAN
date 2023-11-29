@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="producttype">Name Product type</label>
                        <input type="text" name="name" value="{{ $producttype->name  }}" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit Product Type</button>
        </div>
        @csrf
    </form>
@endsection

