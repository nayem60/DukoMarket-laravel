<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
class ServiceController extends Controller
{

    
    public function index()
    {
        $service=service::all();
        return view('Backend.service',compact ('service'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
     
        $request->validate([
          'icon'=>'required',
          'name'=>'required',
          'detail'=>'required'
        ]);
          
          $service=new service ();
          $service->icon=$request->icon;
          $service->name=$request->name;
          $service->detail=$request->detail;
          $service->save();
          return back()->with('success','Service Add Success');
          
          
    }


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
