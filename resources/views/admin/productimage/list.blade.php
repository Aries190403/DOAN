
@extends('admin.main')

@section('content')
    <div class="search-container">
        <form action="{{ route('admin.productimages.search') }}" method="GET">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image Product</th>
                <th>Product Name</th>
                <th>Status</th>
                <th style="width: 100px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allProductimage as $productimage)
            <tr>
                <td>{{ $productimage->id }}</td>
                <td class="image-cell"><img src="{{ $productimage->image_path }}" alt="Product Image" style="max-width: 50px; max-height: 50px;"></td>
                <td>{{ $productimage->product->name }}</td>
                <td>
                    @if ($productimage->status == 1)
                        <span class="btn btn-success btn-xs">AVALIABLE</span>
                    @else
                        <span class="btn btn-danger btn-xs">DELETED</span>
                    @endif
                </td>

                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/productimages/edit/{{ $productimage->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $productimage->id }}, '/admin/productimages/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $productimages->links() !!}
    </div>
@endsection
