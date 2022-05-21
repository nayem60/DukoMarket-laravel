<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 1</title>
    <style>
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <h1>Dukamark</h1>
      <div id="company" class="clearfix">
        <div>Company Name</div><br>
        <div>455 Foggy Heights,<br /> AZ 85004, US</div><br>
        <div>(602) 519-0450</div><br>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
      </div>
      <div id="project">
        <div><span>Customer</span> Info</div><br>
        <div><span>Name:</span>{{ $order->first_name.' '. $order->last_name}} </div><br>
        <div><span>City</span>{{ $order->city }} </div><br>
        <div><span>Country</span>{{ $order->country }} </div><br>
        <div><span>Address</span>{{ $order->address}} </div><br>
        <div><span>Phone</span>{{ $order->number }}</div><br>
        <div><span>DATE</span>{{  Carbon\Carbon::parse($order->created_at)->format('Y-M-d')}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Variant</th>
            <th scope="col">Quantity</th>
            <th scope="col">Unit Price</th>
            <th scope="col">Total Price</th>
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
            <td colspan="4">SUBTOTAL</td>
            <td class="total">${{ $order->subtotal }}</td>
          </tr>
          <tr>
            <td colspan="4">Discount</td>
            <td class="total">${{ $order->discount }}</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">GRAND TOTAL</td>
            <td class="grand total">${{ $order->total }}</td>
          </tr>
        </tbody>
      </table>
    </main>
  </body>
</html>