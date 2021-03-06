<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\brand;
use Illuminate\Support\Str;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=$request->search;
        if($search){
          $brand=brand::where('title',$search)->get();
        }else{
          $brand=brand::all();
        }
          
        $category=category::all();
        $subcategory=subcategory::all();
        return view('Backend.brand',compact('search','category','subcategory','brand'));
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
        $category_id=$request->post('category_id');
        $subcategory_id=$request->post('subcategory_id');
        $title=$request->post('title');
        $slug=$request->post('slug');
        $status=$request->post('status');
        if($category_id == "0" &&  $subcategory_id == "0" && $title){
          return back()->with('error','Field Is Required');
        
        }
        $brand=new brand();
        $brand->category_id=$category_id;
        $brand->subcategory_id=$subcategory_id;
        $brand->title=$title;
        $brand->slug=Str::slug($slug ?? $title,'-');
        $brand->status=$status ?? 0;
        $brand->save();
        return back()->with('success','Add Brand Success!');
        
        
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
        $category_id=$request->post('category_id');
        $subcategory_id=$request->post('subcategory_id');
        $title=$request->post('title');
        $slug=$request->post('slug');
        $status=$request->post('status');
        if($category_id == "0" &&  $subcategory_id == "0" && $title){
          return back()->with('error','Field Is Required');
        
        }
        $brand=brand::find($id);
        $brand->category_id=$category_id;
        $brand->subcategory_id=$subcategory_id;
        $brand->title=$title;
        $brand->slug=Str::slug($slug ?? $title,'-');
        $brand->status=$status ?? 0;
        $brand->save();
        return back()->with('success','Update Brand Success!');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        brand::find($id)->delete ();
        return back()->with('success','Brand Delete Success');
    }
}
