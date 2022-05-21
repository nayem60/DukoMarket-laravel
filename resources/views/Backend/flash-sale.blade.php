@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Flash Sale</h2>
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('flash-sales.store') }}" method="post">
          @csrf
          <div class="form-group">
            <label>Date</label>
            <input type="date" value="{{$flash_sale->sale_date}}" class="form-control" name="sale_date">
          </div>
          <div class="form-group">
            <label>Quantity</label>
            <input type="number" value="{{$flash_sale->product_quantity}}" class="form-control" name="product_quantity" placeholder="Name">
          </div>
          <div class="form-check ml-4">
            <input type="checkbox" value="1" @if($flash_sale->status == 1) checked @endif name="status" class="form-check-input">
            <label class="form-check-label">Active</label>
          </div>
          <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection