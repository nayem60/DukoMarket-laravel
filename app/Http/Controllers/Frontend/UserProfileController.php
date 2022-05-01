<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\User;
use Auth;
class UserProfileController extends Controller
{
    public function index(){
      $orderitem=order::with('orderItem')->get();
      return view('Frontend.user-profile',compact('orderitem'));
    }
    
    public function tracking(Request $request){
       $tracking=$request->get('tracking');
       $order_tracking=order::where('tracking_code',$tracking)->first();
       
      
    }
}
