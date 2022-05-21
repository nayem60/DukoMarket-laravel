<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\flashsale;
use App\Models\order;
use App\Models\Subsubcategory;
use App\Models\footerbanner;
use App\Models\banner;
use App\Models\service;
use App\Models\slider;

class HomeController extends Controller
{
    public function index(){
      $topSelling_Product=product::with('orderitem')->where('quantity','>',0)->withSum('orderitem','quantity')->whereRelation('orderitem.order','status','delivered')->orderBy('orderitem_sum_quantity','desc')->get();
      $array=[];
      foreach($topSelling_Product as $row){
        $array[]=$row->subcategory_child_id;
      }
      $subcategoryChild=Subsubcategory::whereIn('id',$array)->get();
      $featurab_product=product::where('quantity','>',0)->where('featurab',1)->take(4)->get();
      $flash_sale=flashsale::find(1);
      $flash_product=$product=product::with('orderitem')->where('quantity','>',0)->withSum(['orderitem'=>fn($query)=>$query->whereRelation('order','status','delivered')],'quantity')->where('discount_price','>',0)->get();
      $head_banner=banner::all();
      $foot_banner=footerbanner::all();
      $service=service::latest()->take(4)->get();
      $slider=slider::all();
      return view('Frontend.home',compact('product','featurab_product','flash_sale','flash_product','topSelling_Product','subcategoryChild','foot_banner','head_banner','service','slider'));
    }
}
