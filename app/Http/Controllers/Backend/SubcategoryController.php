<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;
use App\Models\subcategory;
class SubcategoryController extends Controller
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
        return view('Backend.subcategory',compact('category','subcategory'));
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
        $title=$request->post('title');
        $slug=$request->post('slug');
        $status=$request->post('status');
        if($category_id=="" && $title== "" && $slug == ""){
          return back()->with('error','Field is Required');
        }
        $subcategory=new subcategory();
        $subcategory->category_id=$category_id;
        $subcategory->title=$title;
        $subcategory->slug=Str::slug($slug,'-') ?? Str::slug($title,'-');
        $subcategory->status=$status ?? 0;
        $subcategory->save();
        return back()->with('success','Subcategory Create Successful!');
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
        $title=$request->post('title');
        $slug=$request->post('slug');
        $status=$request->post('status');
        if($category_id=="" && $title== "" && $slug==""){
          return back()->with('error','Field is Required');
        }
        $subcategory=subcategory::find($id);
        $subcategory->category_id=$category_id;
        $subcategory->title=$title;
        $subcategory->slug=Str::slug($slug,'-') ?? Str::slug($title,'-');
        $subcategory->status=$status ?? 0;
        $subcategory->save();
        return back()->with('success','Subcategory Update Successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subcategory::find($id)->delete ();
        return back()->with('success','Subcategory Delete Successful!');
    }
}
