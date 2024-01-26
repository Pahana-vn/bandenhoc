@extends('backend.layoutBE')
@section('contentBE')
<div class="container-fluid px-4">
    <h1 class="mt-4">Blog</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('be.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Blog</li>
    </ol>
    @if (Session::has("note"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get("note")}}
        <strong> <i class="fa-solid fa-square-check"></i>  Blog !</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('be.blogadd')}}" class="btn btn--sm btn-primary">
                <i class="fas fa-table me-1"></i>
            Add Blog
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Info</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($latestb as $item)
                <?php
                    if($item->status==1){
                        $status='<i class="fa fa-check-circle"></i>';
                    }else {
                        $status='<i class="fa fa-close"></i>';
                    }
                ?>
                <tr>
                        <td> {{$item['id']}} </td>
                        <td> {{$item['title']}} </td>
                        <td> {{$item['name']}} </td>
                        <td> {{$item['info']}} </td>
                        <td>
                            <img width="100" height="100" src="{{asset('public/file/blog/'.$item->image)}}">
                        </td>
                        <td> {!!$status!!} </td>

                        <td>
                            <a class="btn btn-success" href="{{route('be.blogupdate',$item['id'])}}"><i class="fa-solid fa-wrench"></i> Update</a>
                            <a class="btn btn-danger" href="{{route('be.blogdel',$item['id'])}}"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                </tr>
                @endforeach
               </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
