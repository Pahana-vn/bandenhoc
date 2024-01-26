@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Edit Slider</h1>
        <hr>
    </ol>

    <form action="{{route('be.footbannerupdate', $load->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="title" value="{{old('title',isset($load->title)?$load->title:null)}}">
                {!!$errors->first("title",' <div class="text-danger">:message
                    Please provide a valid title.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="desc" value="{{old('desc',isset($load->desc)?$load->desc:null)}}">
                {!!$errors->first("desc",' <div class="text-danger">:message
                    Please provide a valid desc.
                </div>') !!}

            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="image" value="{{old('image',isset($load)?$load->image:null)}}">
                {!!$errors->first("image",' <div class="text-danger">:message
                    Please provide a valid image.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-5">
                <input type="radio" class="" name="status" <?php if($load->status==1){echo"checked";}else{echo"";}?>  value="1"> Active
                <input type="radio" class="" name="status" <?php if($load->status==0){echo"checked";}else{echo"";}?> value="0"> Hide
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button class="btn btn-success" type="submit"> <i class="fa-solid fa-pen-to-square"></i> Edit</button>
                <a class="btn btn-dark" href="{{route('be.footbanner')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
