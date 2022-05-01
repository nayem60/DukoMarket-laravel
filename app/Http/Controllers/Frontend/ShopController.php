<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\subcategory;
use App\Models\color;
use App\Models\size;
use App\Models\brand;
use App\Models\variant;
use App\Models\Subsubcategory;
use App\Models\review;
use App\Models\categorybanner;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$slug)
    {
      //==================Subcategory============
       $subcategory=$request->get('subcategory');
       $subcategory_explode=explode(':',$subcategory);
       $subcategory_filter=array_filter($subcategory_explode);
       $data['unique_subcategory']=array_unique($subcategory_filter);
       $data['subcategory_implode']=implode(':',$data['unique_subcategory']);
      //==================size filter===============
      $sizeId=$request->get('size');
      $size_explode=explode(':', $sizeId);
      $size_filter=array_filter($size_explode);
      $data['unique_size']=array_unique($size_filter);
      $size_implode=implode(':',$data['unique_size']);
      //==================end size filter================
      
     //=====================Rating Filter================
      $data['ratings']=$request->get('rating');
     //====================end rating=============
     
      if(!empty($slug))
      {
        $subcategory=subcategory::where('slug',$slug)->pluck('id');
        $product=product::where('subcategory_id',$subcategory)->get();
      }
      if ($data['unique_subcategory']){
        $product=product::whereIn('subcategory_child_id',$data['unique_subcategory'])->get();
      }
      if($data['unique_size']){
        $variant=variant::whereIn('size_id',$data['unique_size'])->pluck('product_id');
        $product=product::where('subcategory_id',$subcategory)->whereIn('id',$variant)->get();
      }
      if(!empty($data['ratings'])){
        $product=product::with('orderitem')->whereRelation('orderitem.review','rating',$data['ratings'])->get();
       
      }
      
      $data['color']=color::where('subcategory_id',$subcategory)->get();
      $data['size']=size::with('subcategory')->where('subcategory_id',$subcategory)->get();
      $data['brand']=brand::where('subcategory_id',$subcategory)->get();
      $data['review']=review::distinct()->orderBy('rating','desc')->get('rating');
      $data['categorybanner']=categorybanner::where('subcategory_id',$subcategory)->get();
      $data['subcategory_child']=Subsubcategory::where('subcategory_id',$subcategory)->get();
      return view('Frontend.shop',compact('product','size_implode','sizeId','subcategory'),$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
