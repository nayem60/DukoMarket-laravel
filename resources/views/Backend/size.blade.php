@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <div class="content-wrapper">
    <h2 class="text-center pb-5" >Color</h2>
    <div class="row">
      <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th>Category</th>
              <th>Subcategory</th>
              <th>Name</th>
            </tr>
          </thead>
          <tbody>
            @foreach($size as $row)
            <tr>
              <td>{{ $row->category->title }}</td>
              <td>{{ $row->subcategory->title??"" }}</td>
              <td>{{ $row->name }}</td>
               <td>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#edit{{$row->id}}"class="btn btn-info btn-sm">Edit</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#delete{{$row->id}}" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
            <!--Delete -->
            <div class="modal fade" id="delete{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body " style="height:20px;">
                    <h4 class="text-center">Are You Sure</h4>
                  </div>
                  <form action="{{ route('sizes.destroy',$row->id) }}" method="post">
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
              <div class="modal-dialog" role="document">
                <div class="modal-content rounded">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body " >
                  <form action="{{ route('sizes.update',$row->id) }}" method="post">
          @csrf
          @method('put')
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="category" name="category">
              <option> Category </option>
              @foreach($category as $cat)
              <option @if($cat->id == $row->category_id) selected @endif value="{{ $cat->id }}"> {{ $cat->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory </label>
            <select class="form-control" id="subcategory" name="subcategory">
              <option> Choose Subcategory </option>
              @foreach($subcategory as $sub)
              <option @if($sub->id == $row->subcategory_id) selected @endif value="{{ $sub->id }}">{{ $sub->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group append" id='loop_1'>
            <label>Color Value </label>
            <input type="text" value="{{ $row->name }}"class="form-control mb-3" name="size" placeholder="Coupon Value">
          
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
      <div class="col-md-4">
        <form action="{{ route('sizes.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Category</label>
            <select class="form-control" id="categorys" name="category">
              <option> Category </option>
              @foreach($category as $cat)
              <option value="{{ $cat->id }}"> {{ $cat->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory </label>
            <select class="form-control" id="subcategorys" name="subcategory">
              <option> Choose Subcategory </option>
              @foreach($subcategory as $sub)
              <option value="{{ $sub->id }}">{{ $sub->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group append" id='loop_1'>
            <label>Color Value </label>
            <input type="text" class="form-control mb-3" name="size[]" placeholder="Coupon Value">
            <button type="button" onclick="add()" class="btn btn-dark btn-sm mb-4">+Add</button><br>
          </div>
          <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
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
       html+='<input type="text" name="size[]" class="form-control mb-3" placeholder="Coupon Value">'
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
    $('#categorys').on('change',function(){
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
              $('#subcategorys').html(html);
           }
         });
    });
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