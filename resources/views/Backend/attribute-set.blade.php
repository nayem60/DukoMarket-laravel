@extends('Backend.layouts.base')

@section('main')
 <div class="main-panel">
 <div class="content-wrapper">
  <div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <table class="table">
      <thead>
        <tr>
          <th>*</th>
          <th>Name</th>
        </tr>
      </thead>
      <tbody>
        @foreach($attr_set as $key=>$row)
        <tr>
          <td>{{ $key++}}</td>
          <td>{{ $row->name }}</td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
  <form action="{{ route('store_attribute_set') }}"method="post">
    @csrf
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Name">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
@endsection