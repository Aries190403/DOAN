
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>SKU</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Ebook link</th>
                <th>Product Type</th>
                <th>Status</th>
                <th style="width: 100px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allProducts as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td class="image-cell"><img src="{{ $product->image }}" alt="Product Image" style="max-width: 50px; max-height: 50px;"></td>
                <td>{{ $product->SKU }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->ebook_link }}</td>
                <td>{{ $product->producttype->name }}</td>
                <td>
                    @if ($product->stock == 0)
                        <span class="btn btn-warning btn-xs">HẾT HÀNG</span>
                    @elseif ($product->status == 1)
                        <span class="btn btn-success btn-xs">CÒN HÀNG</span>
                    @else
                        <span class="btn btn-danger btn-xs">ĐÃ XÓA</span>
                    @endif
                </td>

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
