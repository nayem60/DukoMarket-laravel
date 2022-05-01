@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Slider</h2>
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
            @foreach($slider as $banner)
            <tr>
              <td><img src="{{asset($banner->image)}}" style="width:50px; height:50px;"></td>
              <td>{{ $banner->first_caption }}</td>
              <td>{{ $banner->last_caption }}</td>
              <td>{{ $banner->action_url }}</td>
              <td>
                <button data-toggle="modal" data-target="#edit{{ $banner->id }}" class="btn btn-info btn-sm">Edit</button>
                <button data-toggle="modal" data-target="#delete{{ $banner->id }}" class="btn btn-danger btn-sm">Delete</button>
              </td>

              <!--Delete -->
              <div class="modal fade" id="delete{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('slider.destroy',$banner->id) }}" method="post">
                      @csrf
                     
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- End Delete-->

              <!-- Edit -->
              <div class="modal fade" id="edit{{$banner->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog " role="document">
                  <div class="modal-content rounded">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('slider.update',$banner->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                     
                        <div class="form-group">
                          <label>Caption 1</label>
                          <input type="text" value="{{ $banner->first_caption }}"class="form-control" name="first_caption" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <label>Capter 2</label>
                          <input type="text" value="{{ $banner->last_caption }}" class="form-control" name="last_caption" placeholder="Name">
                        </div>
                        <div class="form-group">
                          <label>Image</label>
                          <input type="file" class="form-control mb-4" name="new_image" placeholder="Name">
                          <img src="{{asset($banner->image)}}" style="width:50px; height:50px;">
                        </div>
                        <div class="form-group">
                          <label>Type</label>
                          <select class="form-control" name="type">
                            <option value="Hot Deals">Hot Deals</option>
                            <option value="New Deals">New Deals</option>
                            <option value="New Arraivels">New Arraivels</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Action Text</label>
                          <input value="{{ $banner->action_text}}" type="text" class="form-control" name="action_text" id="exampleInputPassword1" placeholder="slug">
                        </div>
                        <div class="form-group">
                          <label>Action Url</label>
                          <input type="text" value="{{ $banner->action_url }}" class="form-control" name="action_url" id="exampleInputPassword1" placeholder="slug">
                        </div>
                        <div class="form-check ml-4">
                          <input type="checkbox" value="1" @if($banner->status == 1) checked @endif name="status" class="form-check-input">
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
              <!-- end edit-->
            </tr>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Capter 1</label>
            <input type="text"  class="form-control" name="first_caption" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Capter 2</label>
            <input type="text" class="form-control" name="last_caption" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image" placeholder="Name">
            
          </div>
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type">
               <option value="Hot Deals">Hot Deals</option>
               <option value="New Deals">New Deals</option>
               <option value="New Arraivels">New Arraivels</option>
            </select>
          </div>
          <div class="form-group">
            <label>Action Text</label>
            <input  type="text" class="form-control" name="action_text" id="exampleInputPassword1" placeholder="slug">
          </div>
          <div class="form-group">
            <label>Action Url</label>
            <input  type="text" class="form-control" name="action_url" id="exampleInputPassword1" placeholder="slug">
          </div>
          <div class="form-check ml-4">
            <input  type="checkbox" value="1" name="status" class="form-check-input">
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