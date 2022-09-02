@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      @if (count($errors)>0)
      <div class="card mt-5">
        <div class="card-body">
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
          </div>

        </div>
      </div>
      @endif
      <div class="card">
        <div class="card-header">Edit Medicine</div>
        <form action="{{route('pharmacy.update',$pharmacy->id)}}" method="post" enctype="multipart/form-data">@csrf
          @method('PUT')
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name of Medicine</label>
              <input type="text" class="form-control" name="name" placeholder="name of medicine" value="{{$pharmacy->name}}">
            </div>
            <div class="form-group">
              <label for="description">Description of Medicine</label>
              <textarea class="form-control" name="description" placeholder="type description">{{$pharmacy->description}}</textarea>
            </div>
            <div class="form-group">
              <label>Medicine Price(LKR)</label>
              <input type="text" class="form-control" name="price" placeholder="price of medicine" value="{{$pharmacy->price}}">
            </div>
            <div class="form-group">
              <label for="description">Category</label>
              <select class="form-control" name="category">
                <option value=""></option>
                <option value="heart">Heart Person</option>
                <option value="suger">Suger Person</option>
                <option value="damaged">Damged Person</option>
              </select>
            </div>
            <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" name="image">
              <img src="{{Storage::url($pharmacy->image)}}" width="80">
            </div><br>
            <div class="form-group text-center">
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection