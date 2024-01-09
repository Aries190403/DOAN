@extends('admin.main')


@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="menu">Slide Show Name</label>
                    <input type="text" name="name" value="{{ $slideshow->name }}" class="form-control"  placeholder="Enter Slide Show Name">
                </div>
                <div class="form-group">
                    <label for="menu">URL</label>
                    <input type="text" name="url" value="{{ $slideshow->url }}" class="form-control"  placeholder="Enter Slide Show URL">
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Slide Image</label>
                        <input type="file"  class="form-control" id="upload">
                        <div id="image_show">
                            <a href="{{ $slideshow->image_slide }}" target="_blank">
                                <img src="{{ $slideshow->image_slide }}" width="100px">
                            </a>
                        </div>
                        <input type="hidden" name="image_slide" value="{{ $slideshow->image_slide }}" id="file">
                    </div>
                </div>


            <div class="col-md-6">
                <label>Status</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="status_avaliable" name="status"
                        {{ $slideshow->status == 1 ? ' checked = ""' : ''}}>
                    <label for="status_avaliable" class="custom-control-label">Online</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="status_deleted" name="status"
                    {{ $slideshow->status == 0 ? ' checked = ""' : ''}}>
                    <label for="status_deleted" class="custom-control-label">Offline</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Edit Slide</button>
        </div>
        @csrf
    </form>
@endsection

