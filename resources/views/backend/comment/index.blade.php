@extends('backend.layoutBE')
@section('contentBE')
<div class="container-fluid px-4">
    <h1 class="mt-4">Comment</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('be.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Comment</li>
    </ol>
    @if (Session::has("note"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get("note")}}
        <strong> <i class="fa-solid fa-square-check"></i> Comment !</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('be.commentadd')}}" class="btn btn--sm btn-primary">
                <i class="fas fa-table me-1"></i>
            Add Comment
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Description</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($com as $item)
                <?php
                    if($item->status==1){
                        $status='<i class="fa fa-check-circle"></i>';
                    }else {
                        $status='<i class="fa fa-close"></i>';
                    }
                ?>
                <tr>
                        <td> {{$item['id']}} </td>
                        <td> {{$item['desc']}} </td>
                        <td> {{$item['name']}} </td>
                        <td> {{$item['pos']}} </td>
                        <td>
                            <img width="100" height="100" src="{{asset('public/file/comment/'.$item->image)}}">
                        </td>
                        <td> {!!$status!!} </td>

                        <td>
                            <a class="btn btn-success" href="{{route('be.commentupdate',$item['id'])}}"><i class="fa-solid fa-wrench"></i> Update</a>
                            <a class="btn btn-danger" href="{{route('be.commentdel',$item['id'])}}"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                </tr>
                @endforeach
               </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
