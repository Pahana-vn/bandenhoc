@extends('backend.layoutBE')
@section('contentBE')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('be.home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Tables</li>
    </ol>
    @if (Session::has("note"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get("note")}}
        <strong> <i class="fa-solid fa-square-check"></i> Category !</strong> You should check in on some of those fields below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('be.categoryadd')}}" class="btn btn--sm btn-primary">
                <i class="fas fa-table me-1"></i>
            Add Category
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Keyword</th>
                        <th>Description</th>
                        <th>Level</th>
                        <th>Image category</th>
                        <th>Status date</th>
                        <th>Action</th>
                    </tr>
                </thead>

               <tbody>
                @foreach ($dm as $item)
                <tr>
                        <td> {{$item['id']}} </td>
                        <td> {{$item['name']}} </td>
                        <td> {{$item['keyword']}} </td>
                        <td> {{$item['desc']}} </td>
                        <td> {{$item['level']}} </td>
                        <td>
                            <img width="100" height="100" src="{{asset('public/file/image/'.$item->image)}}">
                        </td>
                        <td> {{$item['status']}} </td>
                        <td>
                            <a class="btn btn-success" href="{{route('be.categoryupdate',$item->id)}}"><i class="fa-solid fa-wrench"></i> Update</a>
                            <a class="btn btn-danger" href="{{route('be.categorydel',$item->id)}}"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                </tr>
                @endforeach
               </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
