@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">All Medicine</div>

        <div class="card-body">
          @if (session('message'))
          <div class="alert alert-success" role="alert">
            {{ session('message') }}
          </div>
          @endif
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @if(count($pharmaci)>0)
              @foreach($pharmaci as $key=> $pharmacy)
              <tr>
                <th scope="row">{{$key+1}}</th>
                <td><img src="{{Storage::url($pharmacy->image)}}" width="80"></td>
                <td>{{$pharmacy->name}}</td>
                <td>{{$pharmacy->description}}</td>
                <td>{{$pharmacy->category}}</td>
                <td>{{$pharmacy->price}}</td>
                <td><a href="{{route('pharmacy.edit',$pharmacy->id)}}"><button class="btn btn-primary">Edit</button></a></td>
                <td><button class="btn btn-danger">Delete</button></td>
              </tr>
              @endforeach

              @else 
              <p>No Medicine to show</p>
              @endif

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection