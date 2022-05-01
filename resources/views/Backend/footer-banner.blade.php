@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Foot Banner</h2>
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
              <th>First Caption</th>
              <th>Last Caption</th>
              <th>Action Url</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($foot_banner as $row)
            <tr>
              <td><img src="{{ asset($row->image )}}" style="height:100px;width:100px;"></td>
              <td>{{ $row->first_caption }}</td>
              <td>{{ $row->last_caption }}</td>
              <td>{{ $row->action_url }}</td>
              <td>
                <a href="" class="btn btn-info btn-sm">Edit</a>
                <button  data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
             <!--Delete -->
              <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{route('footer-banners.destroy',$row->id)}}" method="post">
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
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store_footer_banner') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Caption 1</label>
            <input type="text" class="form-control" name="first_caption" placeholder="First Caption">
          </div>
           <div class="form-group">
            <label>Capter 2</label>
            <input type="text" class="form-control" name="last_caption" placeholder="Last Caption">
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image" >
          </div>
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" id="subcategory" name="type">
              <option value="New Deals">New Deals</option>
              <option value="Hot Deals">Hot Deals</option>
              <option value="New Arraivels">New Arraivels</option>
            </select>
          </div>
          <div class="form-group">
            <label>Action Text</label>
            <input type="text" class="form-control" name="action_text"  placeholder="Action Text">
          </div>
          <div class="form-group">
            <label>Action Url</label>
            <input type="text" class="form-control" name="action_url" placeholder="Action Url">
          </div>
          <div class="form-check">
            <input type="checkbox" value="1" name="status" class="form-check-input">
            <label class="form-check-label">Active</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection