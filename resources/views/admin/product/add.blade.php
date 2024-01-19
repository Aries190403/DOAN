@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Product Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Enter Product Name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">SKU</label>
                        <input type="text" name="SKU" value="{{ old('SKU') }}" class="form-control"  placeholder="SKU">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Description </label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Price</label>
                        <input type="number" name="price" value="{{ old('price') }}"  class="form-control" placeholder="Enter Product Price">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Stock</label>
                        <input type="number" name="stock" value="{{ old('stock') }}"  class="form-control" placeholder="Enter Product Stock">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control" name="product_type_id">
                            @foreach($producttypes as $producttype)
                                <option value="{{ $producttype->id }}">{{ $producttype->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Ebook Link</label>
                        <input type="text" name="ebook_link" value="{{ old('ebook_link') }}"  class="form-control" placeholder="Enter Product Ebook link">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Image Product</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="image" id="file">
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

