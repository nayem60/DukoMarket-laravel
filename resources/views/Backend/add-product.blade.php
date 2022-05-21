@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Add Product</h2>
  <div class="content-wrapper">
    <div class="row">
     
      <div class="col-md-12">
        <form action="{{route('add-products.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          
          <div class="form-group">
            <label>Category</label>
            <select class="form-control"name="category_id" id="category">
              @foreach($category as $row)
              <option value="{{ $row->id }}">{{ $row->title }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory</label>
            <select class="form-control"name="subcategory_id"id="category">
              @foreach($subcategory as $row)
              <option value="{{ $row->id }}">{{ $row->title }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>SubCategory Child</label>
            <select class="form-control"name="subcategory_child_id"id="category">
              @foreach($subsubcategory as $row)
              <option value="{{ $row->id }}">{{ $row->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Brand</label>
            <select class="form-control"name="brand_id"id="category">
              <option value="">Choose One</option>
              @foreach($brand as $row)
              <option value="{{ $row->id }}" >{{ $row->title}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Slug</label>
            <input type="text" class="form-control" name="slug" placeholder="slug">
          </div>
          <div class="form-group">
            <label>price</label>
            <input type="number" class="form-control" name="price"  placeholder="Price">
          </div>
          <div class="form-group">
            <label>Discount Price</label>
            <input type="number" class="form-control" name="discount_price" placeholder="Discount Price">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label>Sku</label>
            <input type="text" class="form-control" name="sku" placeholder="Sku">
          </div>
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" name="photo" >
          </div>
          <div class="form-group">
            <label>Short Description</label>
            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
          </div>
          <div class="form-group">
            <label>Long Description</label>
            <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
          </div>
          <div class="form-group">
            <label>Stock</label>
            <select class="form-control"name="stock">
              <option value="In Stock">Instock</option>
              <option value="Out Stock">Outstock</option>
            </select>
          </div>
          <div class="form-group">
            <label>Images</label>
            <input type="file" class="form-control"  >
          </div>
         
          <div class="row">
          <div class="form-check col-md-4 ml-4">
            <input type="checkbox" value="1" name="featurab" class="form-check-input">
            <label class="form-check-label">featurab</label>
          </div>
          <div class="form-check col-md-4">
            <input type="checkbox" value="1" name="status" class="form-check-input">
            <label class="form-check-label">Active</label>
          </div>
          
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endpush

@endsection