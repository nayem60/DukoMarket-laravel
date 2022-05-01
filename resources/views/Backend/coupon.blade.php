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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection