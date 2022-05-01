<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\attribute_set;
use App\Models\attribute;
use App\Models\attribute_value;
use App\Models\category;
use App\Models\subcategory;
class AttributeController extends Controller
{
    
    public function index()
    {
      $attr_set=attribute_set::all();
      $category=category::all();
      $subcategory=subcategory::all();
      return view('Backend.attribute',compact('attr_set','category','subcategory'));
    }


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
        $attr_set=$request->post('attr_set');
        $category=$request->post('category');
        $subcategory=$request->post('subcategory');
        $name=$request->post('name');
        $active=$request->post('active');
        $value=$request->post('value');
        
      
        $impode_subcat=implode(',',$subcategory);
        $attribute=new attribute();
        $attribute->attribute_set_id=$attr_set;
        $attribute->category_id=implode(',',$category);
        $attribute->subcategory_id=$impode_subcat;
        $attribute->name=$name;
        $attribute->active=$active;
        $attribute->save();
        
        $count=count($value);
        
        for($i=0;$i<$count;$i++){
           $attr_value=new attribute_value();
           $attr_value->attribute_id=$attribute->id;
           $attr_value->value=$value[$i];
           $attr_value->save();
        }
        
        return back();
        
        

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
