@extends('Backend.layouts.base')

@section('main')
   <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
           
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">All Product</p>
                      <p class="fs-30 mb-2">{{ $all_product }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">All Order</p>
                      <p class="fs-30 mb-2">{{ $all_order }}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Earnings</p>
                      <p class="fs-30 mb-2">${{$total_earning}}</p>
                   
                    </div>
                  </div>
                </div>
       
              </div>
            </div>
          </div>
           <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Order Details</p>
                
                  <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Delivered Order</p>
                      <h3 class="text-primary fs-30 font-weight-medium">{{ $all_order }}</h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Cancelled Order</p>
                      <h3 class="text-primary fs-30 font-weight-medium">{{$cancele_order}}</h3>
                    </div>
                   
                  </div>
                  <canvas id="order-chart"></canvas>
                </div>
              </div>
            </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">Sales Report</p>
                
                 </div>
              
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="sales-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
    
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Today Order</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>  
                      </thead>
                      <tbody>
                       @foreach($order as $orders)
                        @foreach($orders->orderItem as $row)
                        <tr>
                          <td>{{ $row->product->name }}</td>
                          <td class="font-weight-bold">${{ $row->price }}</td>
                          <td>{{ Carbon\Carbon::parse($orders->created_at)->format('d M Y') }}</td>
                          <td class="font-weight-medium"><div class="badge badge-success">{{ $orders->status }}</div></td>
                        </tr>
                       @endforeach
                      @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
     
          </div>
          
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      
        <!-- partial -->
      </div>
 @push('js')
 <script>
   var delivery_month= {!! json_encode($delivery_month) !!}
   var total_delivery={!! json_encode($total_delivery) !!}
   var cancele_month={!! json_encode($cancele_month) !!}
   var total_cancele={!! json_encode($total_cancele) !!}
   
   var sale_month={!! json_encode($online_sale_month) !!}
   var sale_amount={!! json_encode($online_sale_amount) !!}
   var max_sale={!! json_encode($max_sale) !!}
 </script>
 @endpush
@endsection