<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\setting;
class SettingController extends Controller
{
     public function index(){
       $setting=setting::first();
       return view('Backend.setting',compact('setting'));
     }
     public function store(Request $request){
       $setting=setting::first();
       if(!$setting){
          $setting=new setting();
       }
       $logo=$request->file('logo');
       $icon=$request->file('icon');
       $logo_name=time().'.'.$logo->extension ();
       $logo->move('logo/',$logo_name);
       $logo_path='logo/'.$logo_name;
       
       $icon_name=time().'.'.$icon->extension ();
       $icon->move('icon/',$icon_name);
       $icon_path='icon/'.$icon_name;
       if(isset($setting->logo)){
         unlink($setting->logo);
       }
       if(isset($setting->icon)){
         unlink($setting->icon);
       }
       $setting->logo=$logo_path;
       $setting->icon=$icon_path;
       $setting->email=$request->email;
       $setting->number=$request->number;
       $setting->second_number=$request->second_number;
       $setting->maps=$request->maps;
       $setting->twitter=$request->twitter;
       $setting->facebook=$request->facebook;
       $setting->instragram=$request->instragram;
       $setting->youtoube=$request->youtoube;
       $setting->address=$request->address;
       $setting->open_close_detail=$request->open_close_detail;
       $setting->save();
       return back()->with('success','Successful!');
       
     }
}
