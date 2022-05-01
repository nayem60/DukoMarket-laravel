@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Category Banner</h2>
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
      <button data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm float-right mr-4">+ Add</button>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th> Action Url</th>
              <th> Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categorybanner as $banner)
            <tr>
              <td><img src="{{asset($banner->image)}}" style="width:50px;heigth:50px;"></td>
              <td>{{ $banner->category->title }}</td>
              <td>{{ $banner->subcategory->title }}</td>

              <td>{{ $banner->action_url }}</td>
              <td>
                <a href="" class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$banner->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <!--Delete -->
            <div class="modal fade" id="delete{{ $banner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body " style="height:20px;">
                    <h4 class="text-center">Are You Sure</h4>
                  </div>
                  <form action="" method="post">
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

            <!-- End Delete-->
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<!--Add User-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Add Banner</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store_category_banner') }}" method="post" enctype="multipart/form-data">
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
            <label>Image</label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="form-group">
            <label>Action Text</label>
            <input type="text" class="form-control" name="action_text" id="exampleInputPassword1" placeholder="Action Text">
          </div>
          <div class="form-group">
            <label>Action Url</label>
            <input type="text" class="form-control" name="action_url" id="exampleInputPassword1" placeholder="Action Url ">
          </div>
          <div class="form-group ml-4">
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

@push('js')
<script>
  $(document).ready(function() {
    $("#category").change(function() {
      var category = $(this).val();
      $.ajax({
        url: '/admin/get-subcategory',
        data: {
          catId: category
        },
        dataType: 'json',
        method: 'GET',
        success: function(data) {
          var html = '<option> Choose Subcategory </option>'
          $.each(data, function(key, v) {
            html += '<option value="'+v.id+'">'+v.title+'</option>'
          });
          $('#subcategory').html(html);
        }
      });
    });
  });
</script>

@endpush
@endsection