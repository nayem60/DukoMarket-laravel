@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Add Variant</h2>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('add-variants.store') }}" method="post">
          @csrf
        <div id="append">
          <div class="form-group">
            <label>Product</label>
            <select class="form-control select1" id="product" name="product">
              <option>Choose Product</option>
              @foreach($product as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
            @error('product')  <span class="text-danger">{{ $message }}</span> @enderror
          </div>
          <div class="form-group">
            <label>Size</label>
            <select class="form-control " id="size" name="size[]">
              <option>Choose Size</option>
              @foreach($size as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Color</label>
            <select class="form-control" id="color" name="color[]">
              <option>Choose Color</option>
              @foreach($color as $row)
              <option value="{{ $row->id }}">{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" name="quantity[]" placeholder="quantity" required>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" name="price[]" placeholder="price" required>
          </div>
          @error('price')  <span class="text-danger">{{ $message }}</span> @enderror
          <button onclick="append()" type="button" class="btn btn-dark btn-sm float-rigth">+Add</button>
        </div>
          <div class="text-center pt-5">
            <a href="{{ route('variants.index') }}" class="btn btn-secondary btn-sm mr-4">Back</a>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@push('js')
<script>
  var counter=0;
  function append(){
    counter++
    size=$("#size").html();
    color=$("#color").html();
    var html='<div class="mt-5" id="append_'+counter+'">'
        html+='<div class="form-group"><label>Size</label><select class="form-control " id="size" name="size[]">'+size+'</select></div>'
        html+='<div class="form-group"><label>Color</label><select class="form-control " id="color" name="color[]">'+color+'</select></div>'
      
        html+=' <div class="form-group"><label>Quantity</label><input type="number" class="form-control" name="quantity[]"  placeholder="Quantity" required></div>'
        html+='<div class="form-group"><label>Price</label><input type="number" class="form-control" name="price[]"  placeholder="price" required></div>'
        html+='<button onclick="remove('+counter+')" type="button" class="btn btn-danger btn-sm ">remove</button>'
    html+='</div>'
    $("#append").append(html);
  }
  function remove(counter){
    $('#append_'+counter).remove()
  }
 $(document).ready(function() {
    $('.select1').select2();
  
});
</script>
@endpush
@endsection