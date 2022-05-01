@extends('Backend.layouts.base')

@section('main')
 <div class="main-panel">
   <h2 class="text-center m-5"> Head Banner</h2>
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
  <div class="col-md-8 grid-margin stretch-card">
    <table class="table">
      <thead>
        <tr>
          <th>h</th>
          <th>hh</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>vv</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
  <form action="{{ route('store_subcategory') }}" method="post">
    @csrf
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="category_id">
      <option value="fixed"> Choose Category </option>
      @foreach($category as $categoris)
      <option value="{{ $categoris->id }}">{{ $categoris->title }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" name="title"  placeholder="Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" name="slug">Slug</label>
    <input type="text" class="form-control"  placeholder="Slug">
  </div>
  <div class="form-check">
    <input type="checkbox" value="1" class="form-check-input" name="status">
    <label class="form-check-label" for="exampleCheck1">Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection