
@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name Slide</th>
                <th>URl Slide</th>
                <th>Image Slide</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Deteted at</th>
                <th>Status</th>
                <th style="width: 100px">Tools</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slideshows as $slideshow)
            <tr>
                <td>{{ $slideshow->id }}</td>
                <td>{{ $slideshow->name}}</td>
                <td>{{ $slideshow->url}}</td>
                <td class="image-cell"><img src="{{ $slideshow->image_slide }}" alt="Slide Image" style="max-width: 50px; max-height: 50px;"></td>
                <td>{{ $slideshow->created_at }}</td>
                <td>{{ $slideshow->updated_at }}</td>
                <td>{{ $slideshow->deleted_at}}</td>
                <td>
                    @if ($slideshow->status == 1)
                        <span class="btn btn-success btn-xs">AVAILABLE</span>
                    @else
                        <span class="btn btn-danger btn-xs">DELETED</span>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/slideshows/edit/{{ $slideshow->id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $slideshow->id }}, '/admin/slideshows/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
