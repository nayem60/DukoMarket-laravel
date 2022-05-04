<?php
use App\Models\cart;
use App\Models\category;
use App\Models\product;
if(!function_exists('cart_count')){
  function cart_count($user){
    if(Auth::check())
    {
    $i=cart::where('user_id',$user)->get();
    return count($i);
    }else{
      return 0;
    }
    
  }
}

if(!function_exists('cart')){
    function cart($user){
      $cart=cart::with('product')->where('user_id',$user)->get();
      return $cart;
    }
}

if (!function_exists('get_totals')){
    function get_totals($user){
      $total=0;
      $n="";
      $cart=cart::where('user_id',$user)->get();
       foreach($cart as $carts){
            if($carts->variant_id){
              $total=$carts->quantity*$carts->product->discount_price;
            }
       }
            return $total;
      
    }
}


if(!function_exists('totals')){
  function totals($user){
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
        
    return $totals;
    
  }
}



if(!function_exists('category')){
     function category(){
       $category=category::with('subcategory')->get();
       return $category;
     }
}



//=======================checkout Cart item============
if(!function_exists('checkout_cart')){
    function checkout_cart($user){
      $cart=cart::with('product')->where('user_id',$user)->get();
      return $cart;
    }
}
if(!function_exists('cart_price')){
    function cart_price($user){
      $cart=cart::with('product')->where('user_id',$user)->get();
      
      foreach($cart as $i){
        if($i->variant_id){
             $total=$i->variant->price;
        }elseif($i->product->discount_price){
            $total=$i->product->discount_price;
        }else{
             $total= $i->product->price;
        }
        return $total;
        
      }
    }
    
    
}

if(!function_exists('product')){
  function product (){
    $product=product::all();
    return $product;
  }
}