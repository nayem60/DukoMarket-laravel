<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\order;
use App\Models\orderitem;
use App\Models\payment_type;
use Auth;
use DB;
class RazorpayController extends Controller
{
    public function razorpay(Request $request){
      $cart=cart::where('user_id',Auth::user()->id)->get();
      $totals=0;
      foreach($cart as $carts){
            if($carts->variant){
                $totals+=$carts->variant->price*$carts->quantity;
            }elseif($carts->product->discount_price){
               $totals+=$carts->product->discount_price*$carts->quantity;
            }else{
               $totals+=$carts->product->price*$carts->quantity;
            }
       }
      $first_name=$request->input('first_name');
      $last_name=$request->input('last_name');
      $country=$request->input('country');
      $city=$request->input('city');
      $address=$request->input('address');
      $zipcode=$request->input('zipcode');
      $email=$request->input('email');
      $mobile=$request->input('mobile');
      $order_note=$request->input('order_note');
      
      return response()->json([
     'first_name'=>$first_name,
     'last_name'=>$last_name,
     'country'=>$country,
     'city'=>$city,
     'address'=>$address,
     'zipcode'=>$zipcode,
     'email'=>$email,
     'mobile'=>$mobile,
     'order_note'=>$order_note,
     'totals'=>$totals
     
        
        ]);
      
    }
    
    public function success(Request $request){
        $order=new order();
        $order->user_id=Auth::user()->id;
        $order->tracking_code=rand(111111,9999999);
        $order->first_name=$request->input('first_name');
        $order->last_name=$request->input('last_name');
        $order->email=$request->input('email');
        $order->number=$request->input('mobile');
        $order->country=$request->input('country');
        $order->city=$request->input('city');
        $order->zipcode=$request->input('zipcode');
        $order->address=$request->input('address');
        $order->order_note=$request->input('order_note');
  
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
            $orderItem->save();
            
            
         }
         $payment=new payment_type();
         $payment->user_id=Auth::user()->id;
         $payment->order_id=$order->id;
         $payment->orderid=$request->input('orderid');
         $payment->paymeny_id=$request->input('payment_id');
         $payment->mode='razorpy';
         $payment->status='approved';
         $payment->save();
         return response()->json(['status'=>'Add Successful']);
        
       }
     });
        
     
        
    }
    
    
    
}
