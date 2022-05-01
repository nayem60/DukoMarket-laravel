<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\option;
use App\Models\option_value;
class OptionController extends Controller
{

    public function index()
    {
        return view('Backend.option');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $request->all();
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
        //
    }


    public function destroy($id)
    {
        //
    }
}
