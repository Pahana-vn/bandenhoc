@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Add Blog detail</h1>
        <hr>
    </ol>

    <form action="{{route('be.blogdetailadd')}}" method="POST" enctype="multipart/form-data">
        @csrf

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
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                {!!$errors->first("name",' <div class="text-danger">:message
                    Please provide a valid name.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả ngắn</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="motangan" value="{{old('motangan')}}">
                {!!$errors->first("motangan",' <div class="text-danger">:message
                    Please provide a valid motangan.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="content" value="{{old('content')}}">
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="motasanpham" value="{{old('motasanpham')}}">
                {!!$errors->first("motasanpham",' <div class="text-danger">:message
                    Please provide a valid motasanpham.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Blog</label>
            <div class="col-sm-5">
                <select class="form-control" name="id_cat" id="">
                    @foreach ( $bl as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach

                </select>
                {!!$errors->first("id_cat",' <div class="text-danger">:message
                    Please provide a valid name.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button class="btn btn-success" type="submit"> <i class="fa fa-plus"></i> Add</button>
                <a class="btn btn-dark" href="{{route('be.blogdetail')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
