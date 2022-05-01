<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wishlist;
use Auth;
use App\Models\cart;
class WishlistController extends Controller
{
     public function index(){
      $wishlist=wishlist::with('product')->where('user_id',Auth::user()->id)->get();
       return view('Frontend.wishlist',compact('wishlist'));
     }
     
     public function store($id){
       $wishlist=new wishlist();
       $wishlist->user_id=Auth::user()->id;
       $wishlist->product_id=$id;
       $wishlist->save();
       return back();
     }
     public function wishlistToCart($id){
       $wishlist=wishlist::where('id',$id)->first();
       $cart=cart::where('user_id',Auth::user()->id)->where('product_id',$wishlist->product_id)->where('variant_id',null)->first();
       if($cart){
         $cart->quantity+=1;
         $cart->save();
         
        
       }else{
           $cart=new cart();
           $cart->user_id=Auth::user()->id;
           $cart->product_id=$wishlist->product_id;
           $cart->quantity+=1;
           $cart->save();
          
         
       }
       $wishlist->delete();
      
  
       
       
     }
     
     
     public function destroy($id){
       wishlist::findOrFail($id)->delete();
       
     }
}
