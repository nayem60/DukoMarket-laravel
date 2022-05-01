@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Service</h2>
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
              <th>SL</th>
              <th>Icon</th>
              <th>Service Name</th>
              <th> Service Detail</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody>
            @foreach($service as $row)
            <tr>
              <td>vv</td>
              <td><i class="{{ $row->icon }}" style="font-size:30px;"></i></td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->detail }}</td>
              <td>
                <button class="btn btn-info btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </td>
              <!--Delete -->
              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content rounded">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " >
      
     
      <form action="{{ route('services_store')}}" method="post">
        @csrf
         <div class="form-group">
            <label>Service Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Service Caption</label>
            <input type="text" class="form-control" name="detail" placeholder="Caption">
          </div>
          <div class="form-group">
            <label>Icon</label>
            <input type="text" class="form-control" name="icon" placeholder="Fal fa-icon">
          </div>
          
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>



@endsection