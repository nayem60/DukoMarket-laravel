<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
class ProductPageController extends Controller
{
    public function index(Request $request){
      $search=$request->get('search');
      if($search){
        $product=product::where('name','LIKE',"%$search%")->get();
      }else{
        $product=product::all();
      }
      return view('Frontend.product-page',compact('product'));
    }
}
