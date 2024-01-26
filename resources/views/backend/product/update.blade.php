@extends('backend.layoutBE')
@section('contentBE')

<div class="container-fluid px-4">
    <ol class="breadcrumb mb-4">
        <h1 class="breadcrumb-item active">Add Product</h1>
        <hr>
    </ol>

    <form action="{{route('be.productupdate',$load->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="name" value="{{old('name',isset($load)?$load->name:null)}}">
                {!!$errors->first("name",' <div class="text-danger">:message
                    Please provide a valid name.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Keyword</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="keyword" value="{{old('keyword',isset($load)?$load->keyword:null)}}">
                {!!$errors->first("keyword",' <div class="text-danger">:message
                    Please provide a valid keyword.
                </div>') !!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="desc" value="{{old('desc',isset($load)?$load->desc:null)}}">
                {!!$errors->first("desc",' <div class="text-danger">:message
                    Please provide a valid desc.
                </div>') !!}

            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Discount</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="discount" value="{{old('discount',isset($load)?$load->discount:null)}}">
                {!!$errors->first("discount",' <div class="text-danger">:message
                    Please provide a valid discount.
                </div>') !!}

            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="price" value="{{old('price',isset($load)?$load->price:null)}}">
                {!!$errors->first("price",' <div class="text-danger">:message
                    Please provide a valid price.
                </div>') !!}

            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Price old</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="price_old" value="{{old('price_old',isset($load)?$load->price_old:null)}}">
                {!!$errors->first("price_old",' <div class="text-danger">:message
                    Please provide a valid price old.
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
            <label for="inputPassword" class="col-sm-2 col-form-label">Image secondary</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="image_secondary">
                {!!$errors->first("image_secondary",' <div class="text-danger">:message
                    Please provide a valid image_secondary.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Images</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" multiple="multiple" name="images[]">
                {!!$errors->first("images",' <div class="text-danger">:message
                    Please provide a valid images.
                </div>') !!}
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-5">
                <select name="id_cat" id="" class="form-control">
                    @foreach($dm as $item)
                    <option value="{{$item->id}}"   <?php if($item->id==$load->id) { echo "selected";} ?>  >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-5">
                <input type="radio" class="" name="status" <?php if($load->status==1){ echo "checked";} else{ echo "";} ?> checked value="1"> Active
                <input type="radio" class="" name="status" <?php if($load->status==0){ echo "checked";} else{ echo "";} ?> value="0"> Hide
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" id="content" cols="30" rows="10">{!!isset($load)?$load->content:null!!}</textarea>

                <script>
                     CKEDITOR.replace('content');
                </script>

                {!!$errors->first("content",' <div class="text-danger">:message
                    Please provide a valid content.
                </div>') !!}

            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button class="btn btn-success" type="submit"> <i class="fa fa-plus"></i> Add</button>
                <a class="btn btn-dark" href="{{route('be.product')}}"> <i class="fa fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>

    </form>
</div>

@endsection
