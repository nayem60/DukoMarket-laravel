<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\banner;
use Image;
class HeaderBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=banner::paginate(1);
        return view('Backend.header-banner',compact('banner'));
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
        $unique_name=time().'.'.$image->extension();
        image::make($image)->resize(690,200)->save('banner/header_banner/'.$unique_name);
        $image_path='banner/header_banner/'.$unique_name;
        
        $first_caption=$request->post('first_caption');
        $last_caption=$request->post('last_caption');
        $type=$request->post('type');
        $action_text=$request->post('action_text');
        $action_url=$request->post('action_url');
        $status=$request->post('status');
        
        $banner=new banner();
        $banner->first_caption=$first_caption;
        $banner->last_caption=$last_caption;
        $banner->image=$image_path;
        $banner->type=$type;
        $banner->action_text=$action_text;
        $banner->action_url=$action_url;
        $banner->status=$status;
        $banner->save();
        return back()->with('success','Banner Created  Success');
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
        $image=$request->file ('image');
        $banner=banner::findOrFail($id);
        $banner->first_caption=$request->first_caption;
        $banner->last_caption=$request->last_caption;
        $banner->action_text=$request->action_text;
        $banner->action_url=$request->action_url;
        if($image && !empty($image)){
          $image_name=time().'.'.$image->extension();
          image::make($image)->resize(690,200)->save('banner/header_banner/'.$image_name);
          $image_path="banner/header_banner/".$image_name;
          unlink($banner->image);
          $banner->image=$image_path;
          
        }
        $banner->status=$request->status ?? 0;
        $banner->save();
        return back()->with('success','Banner Update  Success');

        
        
    }


    public function destroy($id)
    {
        banner::findOrFail($id)->delete();
        return back()->with('success','Deleted Success');
    }
}
