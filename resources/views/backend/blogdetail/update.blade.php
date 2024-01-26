@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Edit Blog Detail</h1>
        <hr>
    </ol>

    <form action="{{route('be.blogdetailupdate', $load->id)}}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="avatar" value="{{old('avatar',isset($load)?$load->avatar:null)}}">
                {!!$errors->first("avatar",' <div class="text-danger">:message
                    Please provide a valid avatar.
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả ngắn</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="motangan" value="{{old('motangan',isset($load->motangan)?$load->motangan:null)}}">
                {!!$errors->first("motangan",' <div class="text-danger">:message
                    Please provide a valid motangan.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="content" value="{{old('content',isset($load->content)?$load->content:null)}}">
                {!!$errors->first("content",' <div class="text-danger">:message
                    Please provide a valid content.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Note</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="note" value="{{old('note',isset($load->note)?$load->note:null)}}">
                {!!$errors->first("note",' <div class="text-danger">:message
                    Please provide a valid note.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="motasanpham" value="{{old('motasanpham',isset($load->motasanpham)?$load->motasanpham:null)}}">
                {!!$errors->first("motasanpham",' <div class="text-danger">:message
                    Please provide a valid motasanpham.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Blog</label>
            <div class="col-sm-5">
                <select name="id_cat" id="" class="form-control">
                    @foreach($bl as $item)
                    <option value="{{$item->id}}"   <?php if($item->id==$load->id) { echo "selected";} ?>  >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button class="btn btn-success" type="submit"> <i class="fa-solid fa-pen-to-square"></i> Edit</button>
                <a class="btn btn-dark" href="{{route('be.blogdetail')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </form>


</div>

@endsection
