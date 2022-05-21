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

              <!-- Edit -->

              <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>



              <!-- end edit-->
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <form action="{{ route('store_brand') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Capter 1</label>
            <input type="text" class="form-control" name="first_capter" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Capter 2</label>
            <input type="text" class="form-control" name="last_capter" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="image" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Type</label>
            <select class="form-control" id="subcategory" name="subcategory_id">
              <option>  </option>
              <option value=""></option>
            </select>
          </div>
          <div class="form-group">
            <label>Action Text</label>
            <input type="text" class="form-control" name="action_text" id="exampleInputPassword1" placeholder="slug">
          </div>
          <div class="form-group">
            <label>Action Url</label>
            <input type="text" class="form-control" name="action_url" id="exampleInputPassword1" placeholder="slug">
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

<!--Add User-->
<div class="modal fade" id="modals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route ('user.store') }}"method="post">
          @csrf

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


@endsection