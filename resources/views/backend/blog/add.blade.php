@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Add Blog</h1>
        <hr>
    </ol>

    <form action="{{route('be.blogadd')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                {!!$errors->first("title",' <div class="text-danger">:message
                    Please provide a valid title.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                {!!$errors->first("name",' <div class="text-danger">:message
                    Please provide a valid name.
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Info</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="info" value="{{old('info')}}">
                {!!$errors->first("info",' <div class="text-danger">:message
                    Please provide a valid info.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="avatar">
                {!!$errors->first("avatar",' <div class="text-danger">:message
                    Please provide a valid avatar.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name Blogger</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nameblogger" value="{{old('nameblogger')}}">
                {!!$errors->first("nameblogger",' <div class="text-danger">:message
                    Please provide a valid nameblogger.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description short</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="descshort" value="{{old('descshort')}}">
                {!!$errors->first("descshort",' <div class="text-danger">:message
                    Please provide a valid descshort.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                <script>
                     CKEDITOR.replace('content');
                </script>
                {!!$errors->first("content",' <div class="text-danger">:message
                    Please provide a valid content.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="note" value="{{old('note')}}">
                {!!$errors->first("note",' <div class="text-danger">:message
                    Please provide a valid note.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description product</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="descproduct" value="{{old('descproduct')}}">
                {!!$errors->first("descproduct",' <div class="text-danger">:message
                    Please provide a valid descproduct.
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
                <a class="btn btn-dark" href="{{route('be.blog')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
