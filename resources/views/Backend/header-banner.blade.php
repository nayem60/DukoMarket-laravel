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
      <button data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm float-right mr-4">+ Add</button>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 ">

        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>First Captain</th>
              <th>Action Url</th>
              <th>Status </th>
              <th> Action </th>
            </tr>
          </thead>
          <tbody>
            @forelse($banner as $row)
            <tr>
              <td> <img class="img-sm" src="{{ asset($row->image)}}"></td>
              <td>{{$row->first_caption}}</td>
              <td>{{ $row->action_url }}</td>
              <td> {{ ($row->status==1)?'Active':'Unactive'}}</td>
              <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{$row->id}}" class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <!--Delete -->
            <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Head Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body " style="height:20px;">
                    <h4 class="text-center">Are You Sure</h4>
                  </div>
                  <form action="{{route ('header-banners.destroy',$row->id)}}" method="post">
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

            <!-- Edit -->
            <div class="modal fade" id="edit{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog " role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ">

                    <form action="{{ route('header-banners.update',$row->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label>Caption 1</label>
                        <input type="text" value="{{ $row->first_caption}}" class="form-control" name="first_caption" placeholder="First Caption" required>
                      </div>
                      <div class="form-group">
                        <label>Caption 2</label>
                        <input type="text" value="{{ $row->last_caption}}" class="form-control" name="last_caption" placeholder="Last Caption" required>
                      </div>
                      <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" >
                        <img src="{{asset($row->image)}}" style="width:50px; height:50px;">
                      </div>
                      <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type">
                          <option value="Hot Deals">Hot Deals </option>
                          <option value="New Arraivels">New Arraivels</option>
                          <option value="New Deals">New Deals</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Action Text</label>
                        <input type="text" value="{{ $row->action_text }}" class="form-control" name="action_text" placeholder="Action Text" required>
                      </div>
                      <div class="form-group">
                        <label>Action Url</label>
                        <input type="text"  value="{{ $row->action_url }}" class="form-control" name="action_url" placeholder="Action Url" required>
                      </div>
                      <div class="form-check ml-4">
                        <input type="checkbox" value="1" @if( $row->status == 1) checked @endif name="status" class="form-check-input">
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



            <!-- end edit-->
            @empty
            <tr class="text-center" colspan="3">
              <td>Not Found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
        {{ $banner->links() }}
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
        <form action="{{ route('header-banners.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Caption 1</label>
            <input type="text" class="form-control" name="first_caption" placeholder="First Caption" required>
          </div>
          <div class="form-group">
            <label>Caption 2</label>
            <input type="text" class="form-control" name="last_caption" placeholder="Last Caption" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image" required>
          </div>
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" name="type">
              <option value="Hot Deals">Hot Deals </option>
              <option value="New Arraivels">New Arraivels</option>
              <option value="New Deals">New Deals</option>
            </select>
          </div>
          <div class="form-group">
            <label>Action Text</label>
            <input type="text" class="form-control" name="action_text" placeholder="Action Text" required>
          </div>
          <div class="form-group">
            <label>Action Url</label>
            <input type="text" class="form-control" name="action_url" placeholder="Action Url" required>
          </div>
          <div class="form-check ml-4">
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

@endsection