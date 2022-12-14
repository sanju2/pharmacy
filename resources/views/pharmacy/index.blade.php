@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-10">
      <div class="card">

        <div class="card-header">All Medicine</div>

        <div class="card-body">
          <a href="/pharmacy/create"><button class="btn btn-success">Create</button></a>
          <br/><br/>
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
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$pharmacy->id}}">Delete</button></td>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$pharmacy->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <form action="{{route('pharmacy.destroy',$pharmacy->id)}}" method="post">@csrf
                    @method('DELETE')
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
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