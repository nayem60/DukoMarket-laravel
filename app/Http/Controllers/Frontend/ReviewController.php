<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orderitem;
use App\Models\review;
use DB;
class ReviewController extends Controller
{
    public function review($id){
      $orderitem=orderitem::findOrFail($id);
      return view('Frontend.review',compact('orderitem'));
    }
    
    public function store(Request $request){
         $orderitem_id=$request->get('orderitem_id');
         $rating=$request->get('rating');
         $comment=$request->get('comment');
         $review=new review();
         $review->orderitem_id=$orderitem_id;
         $review->rating=$rating;
         $review->comment=$comment;
    
         DB::transaction(function() use($review,$orderitem_id){
           if($review->save()){
             $orderitem=orderitem::findOrFail($orderitem_id)->update(['rstatus'=>0]);
           }
         });
         
    }
}
