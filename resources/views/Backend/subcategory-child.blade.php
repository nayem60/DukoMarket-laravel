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
        <form action="{{ route('store_subcategorychild') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="category" name="category_id">
              <option value="fixed"> Choose Category </option>
              @foreach($category as $categoris)
              <option value="{{ $categoris->id }}">{{ $categoris->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory </label>
            <select class="form-control" id="subcategory" name="subcategory_id">
              <option> Choose Subcategory </option>
              @foreach($subcategory as $sub)
              <option value="{{ $sub->id }}">{{ $sub->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-check">
            <input type="checkbox" value="1" name="status" class="form-check-input">
            <label class="form-check-label">Active</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('js')
<script>
  $(document).ready(function(){
    $("#category").change(function(){
      var category=$(this).val();
      $.ajax({
        url:'/admin/get-subcategory',
        data:{catId:category},
        dataType:'json',
        method:'GET',
        success:function(data){
          var html='<option> Choose Subcategory </option>'
          $.each(data,function(key,v){
              html+='<option value="'+v.id+'">'+v.title+'</option>'
          });
          $('#subcategory').html(html);
        }
      });
    });
  });
</script>

@endpush
@endsection