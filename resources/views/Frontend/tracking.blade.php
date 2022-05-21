@extends('Frontend/layouts/base')
@push('style')
<style>
  * {
    margin: 0;
    padding: 0;
  }

  html {
    height: 100%;
  }

  /*Background color*/
  #grad1 {
    background-color:: #9C27B0;
    background-image: linear-gradient(120deg, #FF4081, #81D4FA);
  }

  /*form styles*/
  #msform {
    text-align: center;
    position: relative;
    margin-top: 20px;
  }

  #msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;

    /*stacking fieldsets above each other*/
    position: relative;
  }

  #msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;

    /*stacking fieldsets above each other*/
    position: relative;
  }

  /*Hide all except first fieldset*/
  #msform fieldset:not(:first-of-type) {
    display: none;
  }

  #msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E;
  }

  #msform input, #msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px;
  }

  #msform input:focus, #msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0;
  }

  /*Blue Buttons*/
  #msform .action-button {
    width: 100px;
    background: skyblue;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
  }

  #msform .action-button:hover, #msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue;
  }

  /*Previous Buttons*/
  #msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
  }

  #msform .action-button-previous:hover, #msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161;
  }

  /*Dropdown List Exp Date*/
  select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px;
  }

  select.list-dt:focus {
    border-bottom: 2px solid skyblue;
  }

  /*The background card*/
  .card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative;
  }

  /*FieldSet headings*/
  .fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left;
  }

  /*progressbar*/
  #progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
  }

  #progressbar .active {
    color: #000000;
  }

  #progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative;
  }

  /*Icons in the ProgressBar*/
  #progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023";
  }

  #progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007";
  }

  #progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f0d1";
  }

  #progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c";
  }

  /*ProgressBar before any progress*/
  #progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px;
  }

  /*ProgressBar connectors*/
  #progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1;
  }

  /*Color number of the step and the connector before it*/
  #progressbar li.active:before, #progressbar li.active:after {
    background: skyblue;
  }

  /*Imaged Radio Buttons*/
  .radio-group {
    position: relative;
    margin-bottom: 25px;
  }

  .radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px;
  }

  .radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3);
  }

  .radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1);
  }

  /*Fit image in bootstrap div*/
  .fit-image {
    width: 100%;
    object-fit: cover;
  }
</style>
@endpush
@section('main')
<!-- MultiStep Form -->

<div class="container-fluid" id="grad1">

  <div class="row justify-content-center mt-0">
    <div class="col-11 col-sm-9 col-md-12 col-lg-12 text-center p-0 mt-3 mb-2">
      <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
        <h2><strong>Tracking Order</strong></h2>

        <div class="row">
          <div class="col-md-12 mx-0">
            <form id="msform">
              <!-- progressbar -->
              <ul id="progressbar">
                <li @if($order_tracking->status == "processing") class="active" @endif id="account"><strong>Processing</strong></li>
                <li id="personal"><strong>Pickup Order</strong></li>
                <li @if($order_tracking->status == "delivered") class="active" @endif  id="payment"><strong>Delivered</strong></li>
                <li  id="confirm"><strong>Finish</strong></li>
              </ul>
              <!-- fieldsets -->
              <div class="row pb-5">
                <h3>Order Summary</h3>
                <div class="col-md-3 mt-3">
                  <h5>Customer Name:</h5>
                  <h5>Customer Number:</h5>
                  <h5>Customer Email:</h5>
                  <h5>Shipping Address:</h5>
                </div>
                <div class="col-md-3 mt-3">
                  <h6>{{$order_tracking->first_name.$order_tracking->last_name}}</h6>
                  <h6>{{ $order_tracking->number}}</h6>
                  <h6>{{ $order_tracking->email }}</h6>
                  <h6>{{ $order_tracking->address }}</h6>
                </div>
                <div class="col-md-3 mt-3">
                  <h5>Order Date:</h5>
                  <h5>Order Status:</h5>
                  <h5>Total Amount:</h5>
                  <h5>Payment Method:</h5>
                </div>
                <div class="col-md-3 mt-3">
                  <h6>{{ Carbon\Carbon::parse($order_tracking->created_at)->format('Y-M-d') }}</h6>
                  <h6>{{ $order_tracking->status }}</h6>
                  <h6>{{ $order_tracking->total }}</h6>
                  <h6>{{ $order_tracking->payment->mode }}</h6>
                  <h6></h6>
                  <h6></h6>
                </div>
              </div>
              <div class="row pt-5">
                <h3> Order Details</h3>
                <div class="col-md-12">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Variant</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Subtotal</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($order_tracking->orderItem as $row)
                      <tr>
                        <th scope="row">{{ $row->product->name }}</th>
                        @if($row->variant_id)
                          @if($row->variant->color && $row->variant->size)
                              <td>Color: <b>{{ $row->variant->color->name}}</b> Size: <b>{{ $row->variant->size->name}}</b> </td>
                          @elseif($row->variant->size)
                               <td>Size: <b>{{ $row->variant->size->name}}</b></td>
                          @else
                               <td>Color: <b>{{ $row->variant->color->name}}</b></td>
                          @endif
                        @else
                         <td></td>
                        @endif
                       
                        <td>{{ $row->quantity }}</td>
                        <td>${{ $row->price }}</td>
                        
                        <td>${{ number_format($row->price*$row->quantity,2,'.') }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-end">
  <div class="col-md-5">
    <div class="cart-page-total">
      <h2>Order Amount</h2>
      <ul class="mb-20">
        <li>Subtotal <span>${{ $order_tracking->subtotal }}</span></li>
        <li>Discount<span>${{ $order_tracking->discount ?? 0}}</span></li>
        <li>Total <span>${{ $order_tracking->total }}</span></li>
      </ul>
    </div>
  </div>
</div>
@endsection