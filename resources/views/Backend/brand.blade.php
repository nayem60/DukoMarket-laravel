@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Brand</h2>
  <div class="row">
    <div class="col-md-4">
      <form>
      <div class="input-group mb-3">
        <input type="text" name="search" value="{{ $search }}" class="form-control form-control-sm rounded-pill" placeholder="Search">
        <div class="input-group-bt mt-2">
          <button type="submit" class="btn btn-primary btn-sm">Search</button>
        </div>
      </div>
      </form>
    </div>
    <div class="col-md-4">
      <button class="btn btn-success btn-sm float-right mr-4">Export</button>
      <button class="btn btn-success btn-sm float-right mr-4 text-white">Import</button>
    </div>
    <div class="col-md-4">
      <button data-toggle="modal" data-target="#add"  class="btn btn-primary btn-sm float-right mr-4">+ Add</button>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 ">
        <table class="table">
          <thead>
            <tr>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($brand as $row)
            <tr>
              <td>{{ $row->category->title }}</td>
              <td>{{ $row->subcategory->title }}</td>
              <td>{{ $row->title }}</td>
              <td>{{ $row->slug }}</td>
              <td>{{ $row->status }}</td>
             <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{$row->id}}"class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <!--Delete -->
            <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body " style="height:20px;">
                    <h4 class="text-center">Are You Sure</h4>
                  </div>
                  <form action="{{ route('brands.destroy',$row->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--Edit -->
            <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('brands.update',$row->id) }}" method="post">
          @csrf
          @method('put')
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="category" name="category_id">
              <option value="0"> Choose Category </option>
              @foreach($category as $categoris)
              <option @if($categoris->id == $row->category_id ) selected @endif value="{{ $categoris->id }}">{{ $categoris->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory </label>
            <select class="form-control" id="subcategory" name="subcategory_id">
              <option value="0"> Choose Subcategory </option>
              @foreach($subcategory as $sub)
              <option @if($sub->id == $row->subcategory_id) selected @endif value="{{ $sub->id }}">{{ $sub->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" value="{{ $row->title }}" class="form-control" name="title" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Slug</label>
            <input type="text"  value="{{ $row->slug }} " class="form-control" name="slug"  placeholder="slug">
          </div>
          <div class="form-check">
            <input @if($row->status==1) checked @endif type="checkbox" value="1" name="status" class="form-check-input">
            <label class="form-check-label">Active</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('brands.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="category" name="category_id">
              <option value="0"> Choose Category </option>
              @foreach($category as $categoris)
              <option value="{{ $categoris->id }}">{{ $categoris->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory </label>
            <select class="form-control" id="subcategory" name="subcategory_id">
              <option value="0"> Choose Subcategory </option>
              @foreach($subcategory as $sub)
              <option value="{{ $sub->id }}">{{ $sub->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="title" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control" name="slug"  placeholder="slug">
          </div>
          <div class="form-check">
            <input type="checkbox" value="1" name="status" class="form-check-input">
            <label class="form-check-label">Active</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
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