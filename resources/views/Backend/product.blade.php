@extends('Backend/layouts/base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Product</h2>
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
  <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Variant</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $row)
            <tr>
              <td><img src="{{ asset('frontend')}}/assets/img/product/{{ $row->image }}" style="height:100px;width:100px;"></td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->category->title ?? "" }}</td>
              <td>{{ $row->subcategory->title ?? "" }}</td>
              @if(!empty($row->variant->color_id)  && !empty($row->variant->size_id) )
                  <td>Color:<b>{{ $row->variant->color->name  }}</b> Size:<b>{{ $row->variant->size->name }}</b></td>
              @elseif(!empty($row->variant->color_id) )
                  <td>Color:{{ $row->variant->color->name}}</td>
              @elseif(!empty($row->variant->size_id) )
                  <td>Size:{{ $row->variant->size->name}}</td>
              @else 
                  <td></td>
              @endif
             <td>
                <a href="" class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
             
         
              <!--Delete -->
              <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content rounded">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
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
            </tr>
            @endforeach
          </tbody>
        </table>
</div>
@endsection