@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Category</h2>
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
              <th>*</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Status</th>

              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $category as $key=>$categoris)
            <tr>
              <td>{{ $key++ }}</td>
              <td>{{ $categoris->title }}</td>
              <td>{{ $categoris->slug }}</td>
              <td>{{ $categoris->status }}</td>
              <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{ $categoris->id}}"  class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$categoris->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <!--Delete -->
            <div class="modal fade" id="delete{{ $categoris->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <form action="{{route('categorys.destroy',$categoris->id)}}" method="post">
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
            <!-- Edit-->
            <div class="modal fade" id="edit{{$categoris->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ">
                    <form action="{{ route ('categorys.update',$categoris->id) }}" method="post">
                          @method('put')
                      @csrf
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="{{ $categoris->title }}"  class="form-control" name="title" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input type="text" value="{{ $categoris->slug }}"  class="form-control" name="slug" placeholder="Slug">
                      </div>
                      <div class="form-check">
                        <input type="checkbox" @if($categoris->status==1) checked @endif class="form-check-input" name="status" value="1"id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Active</label>
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
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<!--Delete -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content rounded">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form action="{{ route ('categorys.index') }}" method="post">

          @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="title" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Slug</label>
            <input type="text" class="form-control" name="slug" placeholder="Slug">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" name="status" value="1"id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Active</label>
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

<!-- End Delete-->
@endsection