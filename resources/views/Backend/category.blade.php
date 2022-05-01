@extends('Backend.layouts.base')

@section('main')
 <div class="main-panel">
   <h2 class="text-center m-5">Category</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="input-group mb-3">
        <input type="text" class="form-control form-control-sm rounded-pill" placeholder="Search">
        <div class="input-group-bt mt-2">
          <button type="button" class="btn btn-primary btn-sm">Search</button>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <button class="btn btn-success btn-sm float-right mr-4">Export</button>
      <button class="btn btn-success btn-sm float-right mr-4 text-white">Import</button>
    </div>
    <div class="col-md-4">
      <button class="btn btn-primary btn-sm float-right mr-4">+ Add</button>
    </div>
  </div>
 <div class="content-wrapper">
  <div class="row">
  <div class="col-md-8">
    <table class="table">
      <thead>
        <tr>
          <th>*</th>
          <th>Title</th>
          <th>Slug</th>
          <th>Status</th>
          <th>Create At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $category as $key=>$categoris)
        <tr>
          <td>{{ $key++ }}</td>
          <td>{{ $categoris->title }}</td>
          <td>{{ $categoris->slug }}</td>
          <td>{{ $categoris->status }}</td>
          <td>{{ $categoris->created_at->diffForHumans() }}</td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
  <form action="{{ route ('store_category') }}" method="post">
    
  @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="title"  placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Slug</label>
    <input type="text" class="form-control" name="slug"  placeholder="Slug">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="status"  value="1"id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection