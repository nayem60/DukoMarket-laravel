@extends('Backend.layouts.base')

@section('main')
 <div class="main-panel">
 <div class="content-wrapper">
  <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
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
        </tr>
      </tbody>
    </table>
  </div>

</div>
  <div class="col-md-8">
  <form action="{{ route('store_option') }}" method="post">
  @csrf
  <div class="form-group ">
    <label>Name</label>
    <input type="text" class="form-control" name="name"  placeholder="Name">
  </div>
  <div class=" form-row append" id="value_1" >
    <div class="col">
        <input type="text"  class="form-control" name="value[]" placeholder="value">
    </div>
    <div class="col mb-3">
        <input type="number"  class="form-control" name="price[]" placeholder="price">
    </div>
    <br><button type="button" onclick="myFunction()" class="btn btn-dark btn-sm text-center mb-3">+Add</button>
  </div>
  <div class="form-check">
    <input type="checkbox"  name="status" value="1" class="form-check-input" >
    <label class="form-check-label" >Active</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
@push('js') 
<script>
var loop_count=1;
  function myFunction(){
    loop_count++
    var html='<div class="form-row" id="value_'+loop_count+'"> '
    html+='<div class="col"><input  type="text" class="form-control" name="value[]" placeholder="value"></div>'
    html+='<div class="col mb-3"><input type="number"  class="form-control form-control-lg" name="price[]" placeholder="price"></div>'
    html+='<br><button type="button" onclick="remove('+loop_count+')" class="btn btn-danger  text-center mb-3">-Remove</button>'
    html+='</div>'
    $(".append").append(html)
  }
  
  function remove(loop_count){
    $('#value_'+loop_count).remove();
  }
</script>
@endpush
@endsection