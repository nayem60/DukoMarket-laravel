@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Order</h2>
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
      
    </div>
  </div>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Customer Name</th>
              <th>Customer Email</th>
              <th>Status</th>
              <th>Total</th>
              <th>Create</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
           @foreach($order as $row)
            <tr>
              <td>{{ $row->id }}</td>
              <td>{{ $row->user->name }}</td>
              <td>{{ $row->user->email }}</td>
              <td>{{ $row->status }}</td>
              <td>5667$</td>
              <td>{{ $row->created_at->diffForHumans() }}</td>
              <td>
                <a href="{{route('view.order',$row->id)}}" class="btn btn-info btn-sm">View</a>
              </td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection