@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Image Product</label>
                            <input type="file"  class="form-control" id="upload">
                        <div id="image_show">

                        </div>
                        <input type="hidden" name="image_path" id="file">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product </label>
                        <select class="form-control" name="product_id">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label>Status</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="status_avaliable" name="status">
                    <label for="status_avaliable" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="status_deleted" name="status">
                    <label for="status_deleted" class="custom-control-label">No</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Product</button>
        </div>
        @csrf
    </form>
@endsection

