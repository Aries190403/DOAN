@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Name publisher</th>
            <th>Active</th>
            <th>Update</th>
            <th style="width: 100px">Tools</th>
        </tr>
        </thead>
        <tbody>
        @foreach($publishers as $key => $publisher)
            <tr>
                <td>{{ $publisher->id }}</td>
                <td>{{ $publisher->name_publisher }}</td>
                <td>{!! \App\Helpers\Helper::active($publisher->active) !!}</td>
                <td>{{ $publisher->updated_at }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/publishers/edit/{{ $publisher->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $publisher->id }}, '/admin/publishers/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $publishers->links() !!}
@endsection


