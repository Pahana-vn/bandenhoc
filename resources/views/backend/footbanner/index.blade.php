@extends('backend.layoutBE')
@section('contentBE')
<div class="container-fluid px-4">
    <h1 class="mt-4">Footer Banner</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('be.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Footer Banner</li>
    </ol>
    @if (Session::has("note"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get("note")}}
        <strong> <i class="fa-solid fa-square-check"></i> Footer Banner !</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('be.footbanneradd')}}" class="btn btn--sm btn-primary">
                <i class="fas fa-table me-1"></i>
            Add banner
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($foot as $item)
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
                        <td> {{$item['desc']}} </td>
                        <td>
                            <img width="100" height="100" src="{{asset('public/file/footbanner/'.$item->image)}}">
                        </td>
                        <td> {!!$status!!} </td>

                        <td>
                            <a class="btn btn-success" href="{{route('be.footbannerupdate',$item['id'])}}"><i class="fa-solid fa-wrench"></i> Update</a>
                            <a class="btn btn-danger" href="{{route('be.footbannerdel',$item['id'])}}"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                </tr>
                @endforeach
               </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
