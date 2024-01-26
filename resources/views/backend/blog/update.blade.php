@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Edit Blog</h1>
        <hr>
    </ol>

    <form action="{{route('be.blogupdate', $load->id)}}" method="POST" enctype="multipart/form-data">
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" value="{{old('name',isset($load->name)?$load->name:null)}}">
                {!!$errors->first("name",' <div class="text-danger">:message
                    Please provide a valid name.
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Info</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="info" value="{{old('info',isset($load->info)?$load->info:null)}}">
                {!!$errors->first("info",' <div class="text-danger">:message
                    Please provide a valid info.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="avatar" value="{{old('avatar',isset($load)?$load->avatar:null)}}">
                {!!$errors->first("avatar",' <div class="text-danger">:message
                    Please provide a valid avatar.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name blogger</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nameblogger" value="{{old('nameblogger',isset($load)?$load->nameblogger:null)}}">
                {!!$errors->first("nameblogger",' <div class="text-danger">:message
                    Please provide a valid nameblogger.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description short</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="descshort" value="{{old('descshort',isset($load)?$load->descshort:null)}}">
                {!!$errors->first("descshort",' <div class="text-danger">:message
                    Please provide a valid descshort.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="content" value="{{old('content',isset($load)?$load->content:null)}}">
                {!!$errors->first("content",' <div class="text-danger">:message
                    Please provide a valid content.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="note" value="{{old('note',isset($load)?$load->note:null)}}">
                {!!$errors->first("note",' <div class="text-danger">:message
                    Please provide a valid note.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description product</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="descproduct" value="{{old('descproduct',isset($load)?$load->descproduct:null)}}">
                {!!$errors->first("descproduct",' <div class="text-danger">:message
                    Please provide a valid descproduct.
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
                <a class="btn btn-dark" href="{{route('be.blog')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
