<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\size;
class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=category::all();
        $subcategory=subcategory::all();
        $size=size::all();
        return view('Backend.size',compact('category','subcategory','size'));
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
        $category=$request->post('category');
        $subcategory=$request->post('subcategory');
        $name=$request->post('size');
        foreach($name as $value){
          $sizes=new size();
          $sizes->category_id=$category;
          $sizes->subcategory_id=$subcategory;
          $sizes->name=$value;
          $sizes->save();
        }
        
        return back()->with('success','Add Size Success');
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
     
        $category=$request->post('category');
        $subcategory=$request->post('subcategory');
        $colors=$request->post('size');

          $color=size::find($id);
          $color->category_id=$category;
          $color->subcategory_id=$subcategory;
          $color->name=$colors;
          $color->save();
        
        return back()->with('success','Update Size Success');
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
