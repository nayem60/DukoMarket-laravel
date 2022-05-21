<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\flashsale;
class FlashSaleController extends Controller
{
    public function index(){
      $flash_sale=flashsale::first();
      return view('Backend.flash-sale',compact('flash_sale'));
    }
    public function store(Request $request){
         $flash_sale=flashsale::first();
         if(!$flash_sale){
           $flash_sale=new flashsale();
         }
         $flash_sale->sale_date=$request->sale_date;
         $flash_sale->product_quantity=$request->product_quantity;
         $flash_sale->status=$request->status ?? 0;
         $flash_sale->save();
         return back()->with('success','Flash Sale Update Successful!');
         
    }
}
