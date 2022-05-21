<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use DGvai\SSLCommerz\SSLCommerz;
use App\Library\SslCommerz\SslCommerzNotification;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Stripe\Error\Card;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\payment_type;
use App\Models\product;

class CheckoutController extends Controller
{   
    
    public function index(){
      $totals=totals(Auth::user()->id);
      if(!Auth::check()){
           return redirect()->route('login');
      }
      if(!$totals > 0){
        return redirect ('/');
      }
      //check cart value getterthen coupon value
       if(session()->has('coupon')){
           if($totals < session()->get('coupon')['cart_value']){
             session ()->forget('coupon');
           }
        }
      $cart=checkout_cart(Auth::user()->id);
      
      return view('Frontend.checkout',compact('cart','totals'));
    }
    
    public function store(Request $request){
   
     
        $request->validate([
           'first_name'=>'required',
           'last_name'=>'required',
           'email'=>'required',
           'phone'=>'required',
           'city'=>'required',
           'zipcode'=>'required',
           'address'=>'required',
           
          ]);
          
        $totals=totals(Auth::user()->id);
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
        
        if(session()->has('checkout')){
          
          $order->discount=session()->get('checkout')['discount'];
          $order->subtotal=session ()->get('checkout')['subtotal'];
          $order->total=session()->get('checkout')['total'];
        }else{
       
          $order->subtotal=$totals;
          $order->total=$totals;
        }
          
        $cart=checkout_cart(Auth::user()->id);
     
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
            
              $orderItem->save();
             
             $product=product::where('id',$orderItem->product_id)->first();
             $product->quantity - $orderItem->quantity;
             $product->save();
             
            
            
         }
         
         cart::where('user_id',Auth::id())->delete();
         $payment=$request->post('payment');
         if($payment === "sslcommerz"){
            cache()->put('orderid',$order->id);
            cache()->put('userid',Auth::id());
            
             $post_data = array();
             if(session ()->has('checkout')){
               $post_data['total_amount'] =session()->get('checkout')['total']; 
             }else{
               $post_data['total_amount'] = $totals; 
             }
             # You cant not pay less than 10
             $post_data['currency'] = "BDT";
             $post_data['tran_id'] = uniqid(); // tran_id must be unique

            # CUSTOMER INFORMATION
             $post_data['cus_name'] = $order->first_name.$order->last_name;
             $post_data['cus_email'] = $order->email;
             $post_data['cus_country'] = $order->country;
             $post_data['cus_phone'] = $order->number;
             $post_data['cus_add1'] = $order->address;
             $post_data['shipping_method'] = "Air";
             $post_data['ship_name'] = $order->first_name.$order->last_name;
             $post_data['ship_add1']=$order->address;
             $post_data['ship_city']=$order->city;
             $post_data['ship_postcode']=$order->zipcode;
             $post_data['ship_country']=$request->post('country');
             $post_data['product_profile']="physical-goods";
        
            //$post_data['shipping_method'] = "NO";
             $post_data['product_name'] = "Computer";
             $post_data['product_category'] = "Goods";
        
             $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
             $payment_options = $sslc->makePayment($post_data, 'hosted');
            
                 if (!is_array($payment_options)) {
                      print_r($payment_options);
                      $payment_options = array();
                }
  
         }elseif($payment === "paypal"){
           $payment=new payment_type();
           $payment->user_id=Auth::user()->id;
           $payment->order_id=$order->id;
           $payment->paymeny_id=$request->post('payment_id');
           $payment->mode='paypal';
           $payment->status='approved';
           $payment->save();
           return response()->json(['status'=>'Add Successful']);
        
             
         }elseif($payment === "stripe"){
          
            $request->validate([
              'card_number'=>'required',
              'cvc'=>'required',
              'exp_month'=>'required',
              'exp_year'=>'required'
              
              ]);
              $stripe=Stripe::make('sk_test_51KMQhFI3IGihHWoZRypJc0oz0Mtq9KCLPGC5ynpuPJDx6cHEL8vB1MCf5qIiCqHtP8jhIWiI3cpEs8KHQIL0ZiSz00WclAyzF5');
             
                $token=$stripe->tokens()->create([
                  'card'=>[
                    'number'=>$request->post('card_number'),
                    'cvc'=>$request->post('cvc'),
                    'exp_month'=>$request->post('exp_month'),
                    'exp_year'=>$request->post('exp_year'),
                    ],
                  ]);
                try{
                  if(!isset($token['id'])){
                    return back()->with('error','The Stripe Token was not generated correctly');
                  }
                  
                  if(session()->has('checkout')){
                    $charge=$stripe->charges()->create([
                       'card'=> $token['id'],
                       'currency'=>'USD',
                       'amount'=>session()->get('checkout')['total'],
                       'description'=>'Add in Wallet'
                    ]);
                    
                    
                  }else{
                    $charge=$stripe->charges()->create([
                       'card'=> $token['id'],
                       'currency'=>'USD',
                       'amount'=>$totals,
                       'description'=>'Add in Wallet'
                    ]);
                    
                    
                  }
                  
                  if($charge['status'] == 'succeeded'){
                   
                    $payment=new payment_type();
                    $payment->user_id=Auth::user()->id;
                    $payment->order_id=$order->id;
                    $payment->paymeny_id=$charge['id'];
                    $payment->mode='stripe';
                    $payment->status='approved';
                    $payment->save();
                    return redirect()->route('thank-you');
                    dd('Add successfull');
           
                  }else{
                    dd('money can not add in wallet');
                  }
                  
                } catch (\Exception $e) {
                  dd($e->getMessage());
                } catch(\Cartalyst\Stripe\Exception\CardErrorException $e) {
                  dd($e->getMessage());
               } catch(\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                  dd($e->getMessage());
               }
                  
              
                
        
         }elseif($payment === "cod"){
           $payment=new payment_type();
           $payment->user_id=Auth::user()->id;
           $payment->order_id=$order->id;
           $payment->mode='cod';
           $payment->status='pending';
           $payment->save();
           dd('add success');
           //return back()->with('success','Order Success');
           
         }
         
        
       }
     });
    
    
    
         
        
    }

    
}

