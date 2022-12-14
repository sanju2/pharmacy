@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-4">
      <div class="card">
        <div class="card-header">List</div>
        <div class="card-body">
          <ul class="list-group">
            <a href="{{route('pharmacy.index')}}" class="list-group-item list-group-item-action">View</a>
            <a href="{{route('pharmacy.create')}}" class="list-group-item list-group-item-action">Create</a>
          </ul>
        </div>
      </div>
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
    </div>

    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Pharmacy</div>
        <form action="{{route('pharmacy.store')}}" method="post" enctype="multipart/form-data">@csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name of Medicine</label>
              <input type="text" class="form-control" name="name" placeholder="name of medicine">
            </div>
            <div class="form-group">
              <label for="description">Description of Medicine</label>
              <textarea class="form-control" name="description" placeholder="type description"></textarea>
            </div>
            <div class="form-group">
              <label>Medicine Price(LKR)</label>
              <input type="number" class="form-control" name="price" placeholder="price of medicine">
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