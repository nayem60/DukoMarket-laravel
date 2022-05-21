<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
class OrderController extends Controller
{
    public function index(){
      $order=order::all();
      return view('Backend.order',compact('order'));
    }
}
