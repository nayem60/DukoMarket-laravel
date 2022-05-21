<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order;
use Carbon\Carbon;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['all_product']=product::count();
       $data['all_order']=order::where('status','delivered')->count();
       $data['cancele_order']=order::where('status','canceled')->count();
       $data['total_earning']=order::where('status','delivered')->sum('total');
       //Order Chart
       $delivery_order=order::where('status','delivered')->get()->groupBy(function ($q){
         return Carbon::parse($q->created_at)->format('M');
       });
      
       $data['delivery_month']=[];
       $data['total_delivery']=[];
       
       foreach($delivery_order as $key=>$value){
         $data['delivery_month'][]=$key;
         $data['total_delivery'][]=$value->count();
       }
       $cancele_order=order::where('status','canceled')->get()->groupBy(function ($q){
         return Carbon::parse($q->created_at)->format('M');
       });
       
       $data['cancele_month']=[];
       $data['total_cancele']=[];
       
       foreach($cancele_order as $key=>$value){
         $data['cancele_month'][]=$key;
         $data['total_cancele'][]=$value->count();
       }
       //===Sale Chart===
       $data['online_sale']=order::where('status','delivered')->whereYear('created_at',Carbon::now()->format('Y'))
       ->get()->groupBy([function ($q){
         return Carbon::parse($q->created_at)->format('M');
       }, function ($total){
         return $total->sum('total');
       }]);
       
       $data['online_sale_month']=[];
       $data['online_sale_amount']=[];
       
       foreach($data['online_sale'] as $month=>$value){
         $data['online_sale_month'][]=$month;
         foreach($value as $amount=>$val){
           $data['online_sale_amount'][]=$amount;
         }
         
       }
       $data['max_sale']=order::where('status','delivered')->whereYear('created_at',Carbon::now()->format('Y'))->sum('total');
       
       $data['order']=order::with('orderItem')->get();
       
       return view("Backend.home",$data);
    }

   
}
