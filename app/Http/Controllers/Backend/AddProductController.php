<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\brand;
use App\Models\category;
use App\Models\subcategory;
use App\Models\Subsubcategory;
use Image;
class AddProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category']=category::all();
        $data['subcategory']=subcategory::all();
        $data['subsubcategory']=Subsubcategory::all();
        $data['brand']=brand::all();
        $data['product']=product::all();
        return view('Backend.add-product',$data);
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


    public function store(Request $request)
    {
       
        
        $image=$request->file('photo');
        $image_name=time().'.'.$image->extension();
        image::make($image)->resize(300,300)->save('product/'.$image_name);
        $image_path='product/'.$image_name;
        $product=new product();
        $product->category_id=$request->post('category_id');
        $product->subcategory_id=$request->post('subcategory_id');
        $product->subcategory_child_id=$request->post('subcategory_child_id');
        $product->brand_id=$request->post('brand_id');
        $product->tag_id=$request->post('tag_id');
        $product->name=$request->post('name');
        $product->slug=$request->post('slug');
        $product->price=$request->post('price');
        $product->discount_price=$request->post('discount_price');
        $product->short_description=$request->post('short_description');
        $product->long_description=$request->post('long_description');
        $product->stock=$request->post('stock');
        $product->quantity=$request->post('quantity');
        $product->sku=$request->post('sku');
        $product->image=$image_path;
        $product->featurab=$request->post('featurab') ?? 0;
        $product->active=$request->post('active') ?? 0;
        $product->save();
        return back()->with('success','Product Add success');
    
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
