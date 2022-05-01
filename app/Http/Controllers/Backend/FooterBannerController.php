<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\footerbanner;
use Image;
class FooterBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foot_banner=footerbanner::all();
        return view('Backend.footer-banner',compact ('foot_banner'));
    
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
        image::make($image)->resize(450,450)->save('banner/footer_banner/'.$image_name);
        $image_path='banner/footer_banner/'.$image_name;
        $first_caption=$request->post('first_caption');
        $last_caption=$request->post('last_caption');
        $action_text=$request->post('action_text');
        $action_url=$request->post('action_url');
        $type=$request->post('type');
        $status=$request->post('status');
        
        $banner=new footerbanner();
        $banner->first_caption=$first_caption;
        $banner->last_caption=$last_caption;
        $banner->type=$type;
        $banner->action_text=$action_text;
        $banner->action_url=$action_url;
        $banner->status=$status;
        $banner->image=$image_path;
        $banner->save();
        return back()->with('success','Foot Banner Create Successful');
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
        footerbanner::findOrFail($id)->delete();
        return back()->with('success','Foot Banner Deleted!');
        
    }
}
