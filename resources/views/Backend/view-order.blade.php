@extends('Backend.layouts.base')

@section('main')
<div class="main-panel">
  <h2 class="text-center m-5"> Order And User Information</h2>
  <a href="{{route('pdf.order',$order->id)}}" class="text-center"><i class="fas fa-print" style="font-size:30px;color:#676e6f;"></i></a>
  <div class="card">
    <div class="card-body">
      <h3> Order Information:</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <h4> Order Date :</h4><br><br>
          <h4> Order Status :</h4><br><br>
          <h4> Payment Method :</h4>
        </div>
         <div class="col-md-5">
          <h4>{{ Carbon\Carbon::parse($order->created_at)->format('Y-M-d') }}</h4><br><br>
          
          <select class="form-control form-control-sm" id="order_status">
            <option @if($order->status=='processing') selected @endif value="processing">processing</option>
            <option @if($order->status=='delivered') selected @endif  value="delivered">delivered</option>
            <option @if($order->status=='canceled') selected @endif value="canceled">canceled</option>
          </select><br><br>
          <input type="hidden"id="order_id" value="{{ $order->id }}">
          <h3>{{ $order->payment->mode?? "" }}</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h3>User Information:</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <h4>User Name :</h4><br><br>
          <h4>User Email :</h4><br><br>
          <h4>User Phone :</h4>
        </div>
         <div class="col-md-5">
          <h4>{{ $order->user->name }}</h4><br><br>
          <h4>{{ $order->user->email}}</h4><br><br>
          <h4>{{ $order->number }}</h4>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h3>Address Information:</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <h4>Username :</h4><br><br>
          <h4>Number :</h4><br><br>
          <h4>Email :</h4><br><br>
          <h4>Country :</h4><br><br>
          <h4>City :</h4><br><br>
          <h4>ZipCode :</h4><br><br>
          <h4>Address:</h4><br><br>
        
        </div>
         <div class="col-md-5">
          <h4>{{$order->first_name.''.$order->last_name}}</h4><br><br>
          <h4>{{ $order->number}}</h4><br><br>
          <h4>{{$order->email}}</h4><br><br>
          <h4>{{$order->country}}</h4><br><br>
          <h4>{{$order->city}}</h4><br><br>
          <h4>{{$order->zipcode}}</h4><br><br>
          <h4>{{$order->address}}</h4><br><br>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h3>Order Items:</h3>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Variant</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>subtotal Price</th>
          </tr>
        </thead>
        <tbody>
        @foreach($order->orderItem as $row)
          <tr>
            <td>{{$row->product->name}}</td>
            <td>
              @if($row->variant_id)
                @if($row->variant->size && $row->variant->color)
                   Color:<b>{{ $row->variant->color->name }}</b>
                   Size:<b>{{ $row->variant->size->name }}</b>
                @elseif($row->variant->color)
                     Color:<b>{{ $row->variant->color->name }}</b>
                @else
                     Size:<b>{{ $row->variant->size->name }}</b>
                @endif
                
              @endif
            </td>
            <td>{{ $row->quantity }}</td>
            <td>${{ $row->price }} </td>
            <td>${{ $row->price * $row->quantity}}</td>
          </tr>
        @endforeach
         <tr>
            <td colspan="4" class="text-rigth"><h4>Subtotal</h4></td>
            <td><h4>${{ $order->subtotal }}</h4></td>
          </tr>
         <tr>
            <td colspan="4" class="text-rigth"><h4>Discount</h4></td>
            <td><h4>${{ $order->discount ?? 0 }}</h4></td>
         </tr>
          <tr>
            <td colspan="4" class="text-rigth"><h4>Total</h4></td>
            <td><h4>${{ $order->total }}</h4></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@push('js')
<script>
 $("#order_status").change(function (){
    var status=$(this).val();
    var order_id=$("#order_id").val();
    var data={
      'id':order_id,
      'status':status
    }
    $.ajax({
      url:'/admin/change-status',
      type:'GET',
      data:data,
      success:function (data){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
             toast.addEventListener('mouseenter', Swal.stopTimer)
             toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
       })
       Toast.fire({
          icon: 'success',
          title: 'Status Change'
       })
      }
    });
  });
  
</script>
@endpush
@endsection