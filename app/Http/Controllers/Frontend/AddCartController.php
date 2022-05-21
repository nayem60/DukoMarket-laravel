<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\variant;
use App\Models\cart;
use App\Models\coupon;
use Carbon\Carbon;
use Auth;
class AddCartController extends Controller
{
    public function index(Request $request)
    {
      if(!Auth::check()){
        return redirect()->route('login');
        }
        $coupon_code=$request->get('coupon_code');
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
        
        //======= check Coupon
        $check_coupon=coupon::where('code',$coupon_code)->where('cart_value','<=',$totals)->where('exfail_date','>=',Carbon::now())->first();
        if($check_coupon){
           session()->put('coupon',[
               'code'=>$check_coupon->code,
               'value'=>$check_coupon->value,
               'cart_value'=>$check_coupon->cart_value,
               'type'=>$check_coupon->type,
             ]);
        }else{
          session()->flash('coupon_error','Invalid Coupon');
        }
        
        ///======coupon discount
        $discount=0;
        $subtotal=0;
        if(session()->has('coupon')){
            if(session()->get('coupon')['type'] == 'fixed'){
               $discount=session()->get('coupon')['value'];
            }else{
              $discount=($totals*session()->get('coupon')['value'])/100;
            }
             $subtotal=$totals-$discount;
        }
        if(session()->has('coupon')){
            session()->put('checkout',[
                 'discount'=>$discount,
                 'subtotal'=>$totals,
                 'total'=>$subtotal,
                  
              ]);
        }else{
          session()->put('checkout',[
                 'discount'=>null,
                 'subtotal'=>$totals,
                 'total'=>$totals,
              ]);
          
        }
        
        //check cart value getterthen coupon value
         if(session()->has('coupon')){
           if($totals < session()->get('coupon')['cart_value']){
             session()->forget('coupon');
           }
         }
        
        return view('Frontend.cart',compact('cart','totals','discount','subtotal'));
    }


    public function create()
    {
        
    }


    public function store(Request $request,$id)
    {
        $quantity=$request->post('quantity');
        $variantId=$request->post('variant');
        $user=Auth::user()->id;
        $check_variant=variant::where("product_id",$id)->first();
      
       if($check_variant){
          $cart_variant=cart::where('user_id',$user)->where('product_id',$id)->where('variant_id',$variantId)->first();
          if($cart_variant){
            $control=1;
          }else{
            $control=0;
          }
       }else{
         $cart_product=cart::where('user_id',$user)->where('product_id',$id)->where('variant_id',null)->first();
          if($cart_product){
            $control=1;
          }else{
            $control=0;
          }
          
       }
       if($request->isMethod('post')){
         if($control==1){
            if(empty($cart_variant) || $cart_variant ==""){
              $data=cart::where('user_id',$user)->where('product_id',$id)->first();
         
            }else{
              $data=cart::where('user_id',$user)->where('variant_id',$variantId)->first();
            }
            $data->quantity+= intval($quantity);
            $data->save();
            return "Quantity Update";
            
            
         }else{
           $carts=new cart();
           $carts->user_id=$user;
           $carts->product_id=$id;
           $carts->variant_id=$variantId;
           $carts->quantity=$quantity;
           $carts->save();
           
         }
         
         
       }else{
           if($control==1){
             $carts=cart::where('user_id',$user)->where('product_id',$id)->where('variant_id',null)->first();
             $carts->quantity+=1;
             $carts->save();
             return back()->with('success','Quantity Update');
           }else{
           $carts=new cart();
           $carts->user_id=$user;
           $carts->product_id=$id;
           $carts->quantity+=1;
           $carts->save();
           return back()->with('success','Add Success');
           }
       }
      
    }


    public function inc($id)
    {
        $cart=cart::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if($cart->quantity >= 1){
          $cart->quantity +=1;
          $cart->save();
        }else{
          $cart->delete();
          
        }
    }


    public function dec($id)
    {
        $cart=cart::where('user_id',Auth::user()->id)->where('id',$id)->first();
        if($cart->quantity > 1){
          $cart->quantity -=1;
          $cart->save();
        }else{
          $cart->delete();
          return 'deleted';
        }
    }



    public function remove($id)
    {
        $cart=cart::where('user_id',Auth::user()->id)->where('id',$id)->delete();
        return back();
    }
    
    
    public function forget_session(){
      session()->forget('coupon');
      return back();
    }
}
