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
        <form action="{{ route('store_color') }}" method="post">
          @csrf
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
          <div class="form-group append" id='loop_1'>
            <label>Color Value </label>
            <input type="text" class="form-control mb-3" name="color[]" placeholder="Coupon Value">
            <button type="button" onclick="add()" class="btn btn-dark btn-sm mb-4">+Add</button><br>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('js')
<script>
var loop_count=1;
 function add(){
   loop_count++
   var html='<div class="form-group" id="loop_'+loop_count+'">'
       html+='<input type="text" name="color[]" class="form-control mb-3" placeholder="Coupon Value">'
       html+='<button type="button" onclick="remove('+loop_count+')" class="btn btn-danger btn-sm">-remove</button><br>'
       html+='</div>'
   $(".append").append(html);
 }
 function remove(loop_count){
   $('#loop_'+loop_count).remove();
 }
</script>

<script>
  $(document).ready(function(){
    $('#category').on('change',function(){
         var catId=$(this).val();
         $.ajax({
           url:'/admin/get-subcategory',
           type:'GET',
           dataType:'json',
           data:{catId:catId},
           success:function(data){
              var html='<option> Chooce Subcategory</option>';
              $.each(data,function(key,value){
                  html+='<option value="'+value.id+'">'+value.title+'</option>'
              });
              $('#subcategory').html(html);
           }
         });
    });
  });
</script>

@endpush
@endsection