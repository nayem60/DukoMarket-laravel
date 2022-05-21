<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\Subsubcategory;
class SubcategoryChildController extends Controller
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
        $sub_child=Subsubcategory::all();
        return view('Backend.subcategory-child',compact('category','subcategory','sub_child'));
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
        $category=$request->post('category_id');
        $subcategory=$request->post('subcategory_id');
        $name=$request->post('name');
        $status=$request->post('status');
        
        if($category=="" && $subcategory=="" && $name=="" ){
          return back()->with('error','Field is required');
        }else{
        $subcategory_child=new Subsubcategory();
        $subcategory_child->category_id=$category;
        $subcategory_child->subcategory_id=$subcategory;
        $subcategory_child->name=$name;
        $subcategory_child->status=$status??0;
        $subcategory_child->save();
        return back()->with('success','Subcategory Child Add successful!');
        }
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
        $category=$request->post('category_id');
        $subcategory=$request->post('subcategory_id');
        $name=$request->post('name');
        $status=$request->post('status');
        
        if($category == null && $subcategory=="" && $name==""){
          return back()->with('error','Field is required');
        }
        $subcategory_child=Subsubcategory::find($id);
        $subcategory_child->category_id=$category;
        $subcategory_child->subcategory_id=$subcategory;
        $subcategory_child->name=$name;
        $subcategory_child->status=$status??0;
        $subcategory_child->save();
        return back()->with('success','Subcategory Child Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subsubcategory::find($id)->delete ();
        return back()->with('success','Delete Successful!');
    }
}
