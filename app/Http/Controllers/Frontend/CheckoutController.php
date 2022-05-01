<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DGvai\SSLCommerz\SSLCommerz;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\payment_type;
use App\Library\SslCommerz\SslCommerzNotification;

class CheckoutController extends Controller
{
    public function index(){
      if(!Auth::check()){
           return redirect()->route('login');
      }
      $cart=checkout_cart(Auth::user()->id);
      $totals=totals(Auth::user()->id);
      return view('Frontend.checkout',compact('cart','totals'));
    }
    
    
    public function store(Request $request){
        
        $order=new order();
        $order->user_id=Auth::user()->id;
        $order->tracking_code=rand(111111,9999999);
        $order->first_name=$request->post('first_name');
        $order->last_name=$request->post('last_name');
        $order->email=$request->post('email');
        $order->number=$request->post('phone');
        $order->country=$request->post('country');
        $order->city=$request->post('city');
        $order->zipcode=$request->post('zipcode');
        $order->address=$request->post('address');
        $order->order_note=$request->post('order_note');
      
        $cart=checkout_cart(Auth::user()->id);
        $totals=totals(Auth::user()->id);
         DB::transaction(function() use ($request,$cart,$totals,$order){
          if($order->save()){
            foreach($cart as $i){
            $orderItem=new orderitem();
            $orderItem->order_id=$order->id;
            $orderItem->product_id=$i->product_id;
            if($i->variant_id){
            $orderItem->variant_id=$i->variant_id;
            }
            if($i->variant_id){
               $orderItem->price=$i->variant->price;
            }elseif($i->product->discount_price){
               $orderItem->price=$i->product->discount_price; 
            }else{
               $orderItem->price=$i->product->price; 
            }
            $orderItem->quantity=$i->quantity;
            $orderItem->total=$totals;
           // $orderItem->save();
            
            
         }
         $payment=$request->post('payment');
         if($payment === "sslcommerz"){
          $sslc = new SSLCommerz();
        $sslc->amount(20)
            ->trxid('DEMOTRX123')
            ->product('Demo Product Name')
            ->customer('Customer Name','custemail@email.com');
        return $sslc->make_payment();
          
          
          
          die();
           $post_data = array();
           $post_data['total_amount'] = '90'; # You cant not pay less than 10
           $post_data['currency'] = "BDT";
           $post_data['tran_id'] = uniqid();
           
           
           $post_data['cus_name'] = 'Customer Name';
           $post_data['cus_email'] = 'customer@mail.com';
           $post_data['cus_add1'] = 'Customer Address';
           $post_data['cus_add2'] = "";
           $post_data['cus_city'] = "";
           $post_data['cus_state'] = "";
           $post_data['cus_postcode'] = "";
           $post_data['cus_country'] = "Bangladesh";
           $post_data['cus_phone'] = '8801XXXXXXXXX';
           $post_data['cus_fax'] = "";
           
           $post_data['ship_name'] = "Store Test";
           $post_data['ship_add1'] = "Dhaka";
           $post_data['ship_add2'] = "Dhaka";
           $post_data['ship_city'] = "Dhaka";
           $post_data['ship_state'] = "Dhaka";
           $post_data['ship_postcode'] = "1000";
           $post_data['ship_phone'] = "";
           $post_data['ship_country'] = "Bangladesh";
           $post_data['shipping_method'] = "NO";
           $post_data['product_name'] = "Computer";
           $post_data['product_category'] = "Goods";
           $post_data['product_profile'] = "physical-goods";
           
           $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
           $payment_options = $sslc->makePayment($post_data, 'hosted');
        
           if (!is_array($payment_options)) {
               print_r($payment_options);
               $payment_options = array();
           }


         }elseif($payment === "aamrpay"){
           $url = 'https://sandbox.aamarpay.com/request.php'; // live url https://secure.aamarpay.com/request.php
            $fields = array(
                'store_id' => 'aamrpay', //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
                 'amount' => '200', //transaction amount
                'payment_type' => 'VISA', //no need to change
                'currency' => 'BDT',  //currenct will be USD/BDT
                'tran_id' => rand(1111111,9999999), //transaction id must be unique from your end
                'cus_name' => 'customer name',  //customer name
                'cus_email' => 'customeremail@mail.com', //customer email address
                'cus_add1' => 'Dhaka',  //customer address
                'cus_add2' => 'Mohakhali DOHS', //customer address
                'cus_city' => 'Dhaka',  //customer city
                'cus_state' => 'Dhaka',  //state
                'cus_postcode' => '1206', //postcode or zipcode
                'cus_country' => 'Bangladesh',  //country
                'cus_phone' => '1231231231231', //customer phone number
                'cus_fax' => 'Not¬Applicable',  //fax
                'ship_name' => 'ship name', //ship name
                'ship_add1' => 'House B-121, Road 21',  //ship address
                'ship_add2' => 'Mohakhali',
                'ship_city' => 'Dhaka', 
                'ship_state' => 'Dhaka',
                'ship_postcode' => '1212', 
                'ship_country' => 'Bangladesh',
                'desc' => 'payment description', 
                'success_url' => route('aamrpay-success'), //your success route
                'fail_url' => route('aamrpay-fail'), //your fail route
                //'cancel_url' => 'http://localhost/foldername/cancel.php', //your cancel url
                'opt_a' => 'Reshad',  //optional paramter
                'opt_b' => 'Akil',
                'opt_c' => 'Liza', 
                'opt_d' => 'Sohel',
                'signature_key' => '28c78bb1f45112f5d40b956fe104645a'); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

                $fields_string = http_build_query($fields);
         
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_VERBOSE, true);
            curl_setopt($ch, CURLOPT_URL, $url);  
      
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));	
            curl_close($ch); 

            $this->redirect_to_merchant($url_forward);
           
         }elseif($payment === "paypal"){
           $payment=new payment_type();
           $payment->user_id=Auth::user()->id;
           $payment->order_id=$order->id;
           $payment->paymeny_id=$request->post('payment_id');
           $payment->mode='paypal';
           $payment->status='approved';
           $payment->save();
           return response()->json(['status'=>'Add Successful']);
        
             
         }
        
        
       }
     });
        
    }
    function redirect_to_merchant($url) {

        ?>
        <html xmlns="http://www.w3.org/1999/xhtml">
          <head><script type="text/javascript">
            function closethisasap() { document.forms["redirectpost"].submit(); } 
          </script></head>
          <body onLoad="closethisasap();">
          
            <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/'.$url; ?>"></form>
            <!-- for live url https://secure.aamarpay.com -->
          </body>
        </html>
        <?php	
        exit;
    } 
}
