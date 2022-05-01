<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use Image;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider=slider::all();
        return view('Backend.slider',compact('slider'));
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
        $slider=new slider();
        $slider->first_caption=$request->first_caption;
        $slider->last_caption=$request->last_caption;
        $slider->type=$request->type;
        $image_name=time().'.'.$image->extension ();
        image::make($image)->resize(990,420)->save('banner/slider/'.$image_name);
        $image_path='banner/slider/'.$image_name;
        $slider->image=$image_path;
        $slider->action_text=$request->action_text;
        $slider->action_url=$request->action_url;
        $slider->status=$request->status ?? 0;
        $slider->save();
        return back()->with('success','Slider Add Success');
        
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
        dd($request->all());
        $image=$request->file('new_image');
        $slider= slider::findOrFail($id);
        $slider->first_caption=$request->first_caption;
        $slider->last_caption=$request->last_caption;
        $slider->type=$request->type;
        if($image && !empty($image)){
          $image_name=time().'.'.$image->extension ();
          image::make($image)->resize(990,420)->save('banner/slider/'.$image_name);
          $image_path='banner/slider/'.$image_name;
          unlink ($slider->image);
          $slider->image=$image_path;
        }
        
        $slider->action_text=$request->action_text;
        $slider->action_url=$request->action_url;
        $slider->status=$request->status;
        $slider->save();
        return back()->with('success','Slider Edit Success');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slider::findOrFail($id)->delete();
        return back()->with('success','Slider Delete Success');
    }
}
