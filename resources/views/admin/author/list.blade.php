@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name Author</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">Tools</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $key => $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name_author }}</td>
                <td>{!! \App\Helpers\Helper::active($author->active) !!}</td>
                <td>{{ $author->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/authors/edit/{{ $author->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $author->id }}, '/admin/authors/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $authors->links() !!}
@endsection


