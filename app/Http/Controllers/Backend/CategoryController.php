<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

//$slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');
class CategoryController extends Controller
{

    public function index()
    {
        $category=category::all();
        return view('Backend.category',compact('category'));
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(category::class, 'slug', $request->slug);
        return response()->json(['slug'=>$slug]);
    }


    public function store(Request $request)
    {
        $title=$request->post('title');
        $slug=$request->post('slug');
        $active=$request->post('status');
        if($title==""){
          return back()->with('error','Field Require');
        }
        $category=new category();
        $category->title=$title;
        $category->slug=Str::slug($slug,'-') ?? Str::slug($title,'-');
        $category->status=$active ?? 0;
        $category->save();
        return back()->with('success','Category Add Successful!');
        
        
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $title=$request->post('title');
        $slug=$request->post('slug');
        $active=$request->post('status');
        if($title==""){
          return back()->with('error','Field is Required');
        }
        $category=category::findOrFail($id);
        $category->title=$title;
        $category->slug=Str::slug($slug,'-') ?? Str::slug($title,'-');
        $category->status=$active ?? 0;
        $category->save();
        return back()->with('success','Category Update Successful!');
        
    }


    public function destroy($id)
    {
        category::find($id)->delete();
        return back()->with('success','Category Delete Successful!');
        
    }
}
