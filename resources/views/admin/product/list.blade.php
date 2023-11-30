
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>;
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Ebook link</th>
                <th>Product Type</th>
                <th>Create at</th>
                <th>Update at</th>
                <th>Status</th>
                <th>Delete at</th>
                <th style="width: 100px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key => $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->SKU }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td><img src="{{ $product->image }}" alt="Product Image" style="max-width: 50px; max-height: 50px;"></td>
                <td>{{ $product->ebook_link }}</td>
                <td>{{ $product->producttype->name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    @unless ($product->deleted_at)
                        <span class="btn btn-success btn-xs">AVAILABLE</span>
                    @else
                        <span class="btn btn-danger btn-xs">DELETED</span>
                    @endunless
                </td>
                <td>{{ $product->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
