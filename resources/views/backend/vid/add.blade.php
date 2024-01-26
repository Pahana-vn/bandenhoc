@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Add Video</h1>
        <hr>
    </ol>

    <form action="{{route('be.videoadd')}}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Link Video</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="linkyt" value="{{old('linkyt')}}">
                {!!$errors->first("linkyt",' <div class="text-danger">:message
                    Please provide a valid linkyt.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="image">
                {!!$errors->first("image",' <div class="text-danger">:message
                    Please provide a valid image.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-5">
                <input type="radio" class="" name="status" checked value="1"> Active
                <input type="radio" class="" name="status" value="0"> Hide
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button class="btn btn-success" type="submit"> <i class="fa fa-plus"></i> Add</button>
                <a class="btn btn-dark" href="{{route('be.video')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
