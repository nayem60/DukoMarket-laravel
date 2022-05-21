@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Variant</h2>
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
      <a href="{{ route('add-variants.index') }}" class="btn btn-primary btn-sm float-right mr-4">+ Add</a>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>Image</th>
              <th>Product</th>
              <th>Size</th>
              <th>Color</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($variant as $key=>$row)
            <tr>
              <td><img src="{{asset('frontend')}}/assets/img/product/{{ $row->product->image }}" style="width:100px; height:100px;"></td>
              <td>{{ $row->product->name }}</td>
              <td>{{ $row->size->name }}</td>
              <td>{{ $row->color->name }}</td>
              <td>{{ $row->price }}</td>
              <td>{{ $row->quantity }}</td>

              <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{$row->id}}" class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>

              <!--Delete -->
              <div class="modal fade" id="delete{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content rounded">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Variant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body " style="height:20px;">
                      <h4 class="text-center">Are You Sure</h4>
                    </div>
                    <form action="{{route('variants.destroy',$row->id)}}" method="post">
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
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content rounded">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Variant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body " >
                    <form action="{{route('variants.update',$row->id)}}" method="post">
                      @csrf
                      @method('put')
                      <div id="append">
                        <div class="form-group">
                          <label>Product</label>
                          <select class="form-control ml-3" id="select" name="product">
                            <option>Choose Product</option>
                            @foreach($product as $rows)
                            <option @if($rows->id == $row->product_id) selected @endif  value="{{ $rows->id }}">{{ $rows->name }}</option>
                            @endforeach
                          </select>
                          @error('product')  <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                          <label>Size</label>
                          <select class="form-control " id="size" name="size">
                            <option>Choose Size</option>
                            @foreach($size as $rows)
                            <option @if($rows->id == $row->size_id) selected @endif value="{{ $rows->id }}">{{ $rows->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Color</label>
                          <select class="form-control" id="color" name="color">
                            <option>Choose Color</option>
                            @foreach($color as $rows)
                            <option @if($rows->id == $row->color_id) selected @endif value="{{ $rows->id }}">{{ $rows->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Quantity</label>
                          <input type="text" value="{{ $row->quantity }}" class="form-control" name="quantity" placeholder="quantity" required>
                        </div>
                        <div class="form-group">
                          <label>Price</label>
                          <input type="text" value="{{ $row->price }}"  class="form-control" name="price" placeholder="price" required>
                        </div>
                        
                      </div> 
                     </div>
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
@push('js')
<script>
$(document).ready(function() {
    $('#select').select2();
   
  
});
</script>
@endpush
@endsection