@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Subcategory</h2>
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
              <th>#</th>
              <th>Category</th>
              <th>Name</th>
              <th>Slug</th>
              <th> Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($subcategory as $key=>$row)
            <tr>
              <td>{{ $key++ }}</td>
              <td>{{ $row->category->title }}</td>
              <td>{{ $row->title }}</td>
              <td>{{ $row->slug }}</td>
              <td>{{ $row->status==1 ? 'On':'Off' }}</td>
              <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{ $row->id }}" class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{ $row->id }}" class="btn btn-danger btn-sm">Delete</a>
              </td>

            </tr>
            <!--Delete -->
            <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body " style="height:20px;">
                    <h4 class="text-center">Are You Sure</h4>
                  </div>
                  <form action="{{route('subcategorys.destroy',$row->id)}}" method="post">
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
            <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body ">
                    <form action="{{ route('subcategorys.update',$row->id) }}" method="post">
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                          <option> Choose Category </option>
                          @foreach($category as $categoris)
                          <option @if($categoris->id==$row->category_id) selected @endif value="{{ $categoris->id }}">{{ $categoris->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" value="{{ $row->title }}" class="form-control" name="title" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1" >Slug</label>
                        <input type="text" name="slug" value="{{ $row->slug }}" class="form-control" placeholder="Slug">
                      </div>
                      <div class="form-check ml-4">
                        <input type="checkbox" value="1" @if($row->status==1) checked @endif  class="form-check-input" name="status">
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

<!--add-->
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
        <form action="{{ route('subcategorys.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
              <option > Choose Category </option>
              @foreach($category as $categoris)
              <option value="{{ $categoris->id }}">{{ $categoris->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" name="title" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" >Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Slug">
          </div>
          <div class="form-check ml-4">
            <input type="checkbox" value="1" class="form-check-input" name="status">
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

@endsection