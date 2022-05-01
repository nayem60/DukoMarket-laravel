<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\categorybanner;
use Image;
class CategoryBannerController extends Controller
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
        $categorybanner=categorybanner::with('category','subcategory')->get();
        return view('Backend.category-banner',compact('category','subcategory','categorybanner'));
    
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
        $image=$request->file('image');
        $image_name=time().'.'.$image->extension();
        image::make($image)->resize(1080,230)->save("banner/category_banner/".$image_name);
        $image_path="banner/category_banner/".$image_name;
        $category=$request->post('category_id');
        $subcategory=$request->post('subcategory_id');
        $action_text=$request->post('action_text');
        $action_url=$request->post('action_url');
        $status=$request->post('status');
        
        $banner=new categorybanner();
        $banner->category_id=$category;
        $banner->subcategory_id=$subcategory;
        $banner->action_text=$action_text;
        $banner->action_url=$action_url;
        $banner->status=$status;
        $banner->image=$image_path;
        $banner->save();
        return back()->with('success','Category Banner Add Success');
        
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
