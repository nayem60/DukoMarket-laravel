@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5">Coupon</h2>
   <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
      <button data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm float-right mr-4">+ Add</button>
    </div>
  </div>
  <div class="content-wrapper">
    <div class="">
      <div class="">
        <table class="table">
          <thead>
            <tr>
              <th>Code</th>
              <th>Value</th>
              <th>Cart Value</th>
              <th>Trype</th>
              <th>End Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($coupon as $row)
            <tr>
              <td>{{ $row->code }}</td>
              <td>{{ $row->value}}</td>
              <td>{{ $row->cart_value }}</td>
              <td>{{ $row->trype }}</td>
              <td>{{ $row->exfail_date }}</td>
              <td>
                <a href="" class="">Edit</a>
                <a href="">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content rounded">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Coupon</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form>
          <div class="form-group">
            <label>Coupon Code</label>
            <input type="text" class="form-control" placeholder="Coupon Code">
          </div>
          <div class="form-group">
            <label>Coupon Type</label>
            <select class="form-control">
              <option value="fixed"> Fixed </option>
              <option value="percent"> Percent</option>
            </select>
          </div>
          <div class="form-group">
            <label>Coupon Value </label>
            <input type="number" class="form-control" placeholder="Coupon Value">
          </div>
          <div class="form-group">
            <label>Cart Value</label>
            <input type="number" class="form-control" placeholder="Cart Value">
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1">Active</label>
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
@endsection