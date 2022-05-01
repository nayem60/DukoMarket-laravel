@extends('Backend.layouts.base')

@section('main')
 <div class="main-panel">
 <div class="content-wrapper">
  <div class="row">
  <div class="col-md-8 grid-margin stretch-card">
    <table class="table">
      <thead>
        <tr>
          <th>gggf</th>
          <th>hh</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>vv</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="col-md-4">
  <form action="{{ route('store_attribute') }}" method="post">
    @csrf
  <div class="form-group">
    <label>Attribute Set </label>
    <select class="form-control attr" name="attr_set">
      <option> Choose Attribute Set </option>
      @foreach($attr_set as $row)
      <option value="{{ $row->id }}">{{ $row->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control category" name="category[]" multiple>
      <option> Choose Category </option>
      @foreach($category as $cat)
      <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
      @endforeach
    </select>
  </div>
<div class="form-group">
    <label>Subcategory</label>
    <select class="form-control subcategory" name="subcategory[]" multiple>
      <option> Choose Subcategory </option>
      @foreach($subcategory as $sub)
      <option value="{{ $sub->id }}">{{ $sub->title }}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control"  name="name" placeholder="Name">
  </div>
  <div class="form-group append" id="value_1">
    <label>Value</label>
    <input type="text" class="form-control mb-3" name="value[]" placeholder="Value">
     <button type="button"onclick="add()" class="btn btn-dark btn-sm mb-3">+Add</button><br>
  </div>
  <div class="form-check">
    <input type="checkbox" name="active" value="1"class="form-check-input" >
    <label class="form-check-label" >Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>

@push('js')
<script>
$(document).ready(function() {
    $('.attr').select2();
    $('.category').select2();
    $('.subcategory').select2();
});
var loop_count=1;
function add(){
  loop_count++
  var html='<div class="form-group" id="value_'+loop_count+'">'
      html+=' <input type="text" name="value[]" class="form-control mb-3"  placeholder="Value">'
      html+='  <button type="button"onclick="remove('+loop_count+')" class="btn btn-danger btn-sm">-remove</button>'
      html+='</div>'
  
  $('.append').append(html);
}
function remove(loop_count){
  $('#value_'+loop_count).remove();
  
}
</script>
@endpush
@endsection