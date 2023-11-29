@extends('admin.main')

@section('header')
    {{-- <script src="/ckeitor/ckeditor.js"></script> --}}
@endsection
@section('content')
    <form action="" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Name Category: </label>
                <input type="text" name="name" value="{{ $menu->name }}" class="form-control" placeholder="Enter name category">
            </div>

            <div class="form-group">
                <label for="menu">Parent Category: </label>
            <select class="form-control" name="parent_id">
                <option value="0" {{$menu->parent_id == 0 ? 'selected': ''}}>
                    Parent Category</option>
                @foreach ($menus as $menuParent)
                    <option value="{{ $menuParent->id }}"
                        {{$menu->parent_id == $menuParent->id ? 'selected': ''}}>
                        {{ $menuParent->name }}
                    </option>
                @endforeach
            </select>
            </div>

            <div class="form-group">
                <label for="menu">Desciption: </label>
                <textarea name="description" class="form-control"> {{$menu->description}} </textarea>
            </div>

            <div class="form-group">
                <label for="menu">Content: </label>
                <textarea name="content" id="content" class="form-control"> {{$menu->content}} </textarea>
            </div>

            <div class="form-group">
                <label for="menu">Category Image</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $menu->file }}" target="_blank">
                        <img src="{{ $menu->file }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="file" value="{{ $menu->file }}" id="file">
            </div>

            <div>
                <label> Active</label>
            <div class="custom-control custom-radio">

                <input class="custom-control-input" value="1" type="radio" id="active"
                    name="active" {{$menu->active == 1 ? 'checked=""' : ''}}>
                <label for="active" class="custom-control-label">Yes</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" value="0" id="no_active"
                    name="active" {{$menu->active == 0 ? 'checked=""' : ''}}>
                <label for="no_active" class="custom-control-label">No</label>
            </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </div>
    </form>
@endsection

{{-- @section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection --}}
