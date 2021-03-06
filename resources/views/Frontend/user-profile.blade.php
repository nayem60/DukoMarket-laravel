@extends('Frontend/layouts.base')

@section('main')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action active" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Order</a>
          <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Tracking Order</a>
          <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Change Password</a>
          <a class="list-group-item list-group-item-action" id="list-settings-list" data-bs-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
        </div>
      </div>
      <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Image</th>
                  <th scope="col">Name</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                  <th scope="col">Review</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orderitem as $orderitems)
                  @foreach($orderitems->orderItem as $row)
                <tr>
                  <td class="product-thumbnail"><a href="shop-details.html"><img src="{{ asset('frontend') }}/assets/img/product/{{ $row->product->image }}" alt=""></a></td>
                  <td>{{ $row->product->name }}</td>
                  <td>{{ $row->product->price }}</td>
                  <td>{{ $row->quantity }}</td>
                  <td>{{ number_format($row->quantity*$row->product->price,2,'.','') }}</td>
                 @if($orderitems->status==='delivered' && $row->rstatus===1)
                  <td><a href="{{route('review',$row->id)}}" class="text-warning">review</a></td>
                 @endif
                </tr>
                 @endforeach
                @endforeach
              </tbody>

            </table>
          </div>
          <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <form action="{{route('order.tracking')}}">
              <div class="btn-group d-flex justify-content-center">
                <input type="text" class="form-control" name="tracking" placeholder="Tracking Order">
                <button type="submit" class="btn btn-primary">Search..</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
            ...
          </div>
          <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
            ...
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
