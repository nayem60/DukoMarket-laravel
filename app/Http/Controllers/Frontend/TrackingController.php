<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TrackingController extends Controller
{
  public function tracking(Request $request){
    try{
    $tracking_no=$request->get('tracking');
    $order_tracking=order::where('user_id',Auth::id())->where('tracking_code',$tracking_no)->firstOrFail();
    
    }catch(ModelNotFoundException $e){
      return "Not Found Tracking number";
    }catch(\Exception $e){
      dd(get_class($e));
    }
    return view('Frontend.tracking',compact('order_tracking'));
    
  }
  
}
