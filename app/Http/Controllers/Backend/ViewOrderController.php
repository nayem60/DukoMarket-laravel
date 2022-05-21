<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use PDF;
class ViewOrderController extends Controller
{
    public function index($id){
      $order=order::with(['payment','orderItem','user'])->where('id',$id)->first();
    
      return view('Backend.view-order',compact('order'));
    }
    public function pdf($id){
      $order=order::with(['payment','orderItem','user'])->where('id',$id)->first();
      $pdf=PDF::loadView('Backend.pdf.order-pdf',compact('order'));
      return $pdf->setPaper('a4', 'landscape')->download('order-report.pdf');
      return view('Backend.pdf.order-pdf',compact('order'));
    }
    
    public function status(Request $request){
      
      $id=$request->get('id');
      $status=$request->get('status');
      order::where('id',$id)->update(['status'=>$status]);
    }
}
