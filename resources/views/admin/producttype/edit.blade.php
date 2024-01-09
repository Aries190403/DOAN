@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="producttype">Name Product type</label>
                        <input type="text" name="name" value="{{ $producttype->name  }}" class="form-control">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label>Status</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="status_avaliable" name="status"
                        {{ $producttype->status == 1 ? ' checked = ""' : ''}}>
                    <label for="status_avaliable" class="custom-control-label">Online</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="status_deleted" name="status"
                    {{ $producttype->status == 0 ? ' checked = ""' : ''}}>
                    <label for="status_deleted" class="custom-control-label">Offline</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        @csrf
    </form>
@endsection

