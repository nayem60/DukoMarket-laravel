<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\color;
class ColorController extends Controller
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
        $color=color::all();
        return view('Backend.color',compact('category','subcategory','color'));
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
        $color=$request->post('color');
        foreach($color as $value){
          $color=new color();
          $color->category_id=$category;
          $color->subcategory_id=$subcategory;
          $color->name=$value;
          $color->save();
        }
        
        return back()->with('success','Add Color Success');
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


    public function update(Request $request, $id)
    {
     
        $category=$request->post('category');
        $subcategory=$request->post('subcategory');
        $colors=$request->post('color');

          $color=color::find($id);
          $color->category_id=$category;
          $color->subcategory_id=$subcategory;
          $color->name=$colors;
          $color->save();
        
        return back()->with('success','Update Color Success');
    }


    public function destroy($id)
    {
        //
    }
    
  
}
