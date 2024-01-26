@extends('backend.layoutBE')
@section('contentBE')
<div class="container-fluid px-4">
    <h1 class="mt-4">Blog detail</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('be.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Blog detail</li>
    </ol>
    @if (Session::has("note"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get("note")}}
        <strong> <i class="fa-solid fa-square-check"></i>  Blog detail !</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('be.blogdetailadd')}}" class="btn btn--sm btn-primary">
                <i class="fas fa-table me-1"></i>
            Add Blog detail
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Avatar</th>
                        <th>name</th>
                        <th>Mô tả ngắn</th>
                        <th>Content</th>
                        <th>Note</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Action</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($blogd as $item)

                <tr>
                        <td> {{$item['id']}} </td>
                        <td>
                            <img width="100" height="100" src="{{asset('public/file/blogdetail/'.$item->image)}}">
                        </td>
                        <td> {{$item['name']}} </td>
                        <td> {{$item['motangan']}} </td>
                        <td> {{$item['content']}} </td>
                        <td> {{$item['note']}} </td>
                        <td> {{$item['motasanpham']}} </td>
                        <td>
                            <a class="btn btn-success" href="{{route('be.blogdetailupdate',$item['id'])}}"><i class="fa-solid fa-wrench"></i> Update</a>
                            <a class="btn btn-danger" href="{{route('be.blogdetaildel',$item['id'])}}"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                </tr>
                @endforeach
               </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
