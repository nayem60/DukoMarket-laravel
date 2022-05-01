<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
class TrackingController extends Controller
{
  public function tracking(Request $request){
    $tracking_no=$request->get('tracking');
    $order_tracking=order::where('tracking_code',$tracking)->first();
    return view('Frontend.tracking');
  }
  
}
