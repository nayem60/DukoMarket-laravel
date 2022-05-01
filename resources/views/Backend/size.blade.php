@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
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
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-4">
        <form>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="category" name="category">
              <option> Category </option>
              @foreach($category as $cat)
              <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory </label>
            <select class="form-control" id="subcategory" name="subcategory">
              <option> Choose Subcategory </option>
              @foreach($subcategory as $sub)
              <option value="{{ $sub->id }}">{{ $sub->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group append" id="loop_1">
            <label>Size Name </label>
            <input type="text" class="form-control mb-3" placeholder=" Value">
             <button onclick="add()" type="button" class="btn btn-dark btn-sm mb-5">+Add</button>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('js')
<script>
  $(document).ready(function(){
    $("#category").change(function(){
      var category=$(this).val()
      $.ajax({
        url:'/admin/get-subcategory',
        dataType:'json',
        data:{catId:category},
        method:'GET',
        success:function(data){
          var html='<option>Choose Subcategory</option>'
          $.each(data,function(key,v){
            html+='<option value="'+v.id+'">'+v.title+'</option>'
          })
          $("#subcategory").html(html);
        }
      });
    });
  });
</script>

  <script>
  var loop_count=1;
    function add(){
      loop_count++
      var html='<div class="form-group" id="loop_'+loop_count+'">'
      html+='<label>Size Name </label>'
      html+='<input type="text" class="form-control mb-3" placeholder=" Value">'
      html+='<button type="button" onclick="remove('+loop_count+')" class="btn btn-danger btn-sm mb-3">-remove</button>'
      html+='</div>'
      
      $(".append").append(html)
    }
    function remove(loop_count){
      $('#loop_'+loop_count).remove();
    }
  </script>
@endpush
@endsection