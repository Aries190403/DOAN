@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name Author</th>
            <th>created_at</th>
            <th>Update</th>
            <th>Status</th>
            <th>deleted_at</th>
            <th style="width: 100px">Tools</th>
        </tr>
        </thead>
        <tbody>
        @foreach($producttypes as $key => $producttype)
            <tr>
                <td>{{ $producttype->id }}</td>
                <td>{{ $producttype->name }}</td>
                <td>{{ $producttype->created_at }}</td>
                <td>{{ $producttype->updated_at }}</td>
                <td>
                    @if ($producttype->status == 1)
                        <span class="btn btn-success btn-xs">AVAILABLE</span>
                    @else
                        <span class="btn btn-danger btn-xs">DELETED</span>
                    @endif
                    {{-- @unless ($producttype->deleted_at)
                        <span class="btn btn-success btn-xs">AVAILABLE</span>
                    @else
                        <span class="btn btn-danger btn-xs">DELETED</span>
                    @endunless --}}
                </td>
                <td>{{ $producttype->deleted_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/producttypes/edit/{{ $producttype->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $producttype->id }}, '/admin/producttypes/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $producttypes->links() !!}
@endsection


