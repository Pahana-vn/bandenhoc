@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Edit Category</h1>
        <hr>
    </ol>

    <form action="{{route('be.categoryupdate', $load->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" value="{{old('name',isset($load->name)?$load->name:null)}}">
                {!!$errors->first("name",' <div class="text-danger">:message
                    Please provide a valid name.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Keyword</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="keyword" value="{{old('keyword',isset($load->keyword)?$load->keyword:null)}}">
                {!!$errors->first("keyword",' <div class="text-danger">:message
                    Please provide a valid keyword.
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="desc" value="{{old('desc',isset($load->desc)?$load->desc:null)}}">
                {!!$errors->first("desc",' <div class="text-danger">:message
                    Please provide a valid desc.
                </div>') !!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="level" value="{{old('level',isset($load->level)?$load->level:null)}}">
                {!!$errors->first("level",' <div class="text-danger">:message
                    Please provide a valid level.
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
                <a class="btn btn-dark" href="{{route('be.category')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
