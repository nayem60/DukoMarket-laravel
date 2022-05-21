<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\size;
use App\Models\color;
use App\Models\product;
use App\Models\variant;

class AddVariantController extends Controller
{
    public function index(){
      $data['product']=product::all();
      $data['size']=size::all();
      $data['color']=color::all();
      return view ('Backend.add-variant',$data);
    }
    public function store(Request $request){
        $request->validate([
            'product'=>'required',
            'price'=>'required',
         ]);
        $size=$request->post('price');
        for($i=0;$i<count($size);$i++){
          $variant=new variant ();
          $variant->product_id=$request->product;
          $variant->size_id=$request->size[$i];
          $variant->color_id=$request->color[$i];
          $variant->price=$request->price[$i];
          $variant->quantity=$request->quantity[$i];
          $variant->save();
        }
        return back()->with('success','Variant Add Success');
        
    }
    
}
