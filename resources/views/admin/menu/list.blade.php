
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>;
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 100px">&nsbp</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection
