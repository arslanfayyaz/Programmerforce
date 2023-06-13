<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
         //dd($categories)
        return view('category.index',compact('categories'));

    }

    public function edit(Request $request, $id)
    {
        // dd($id);
        $category = Category::findOrFail($id);
        return view('category.edit',compact('category'));
    }
    public function create()
    {   
        $categories = Category::all();
        return view('category.create',compact('categories'));
    }
    public function update(Request $request,$id)
    {   
        $data = Category::find($id);
        $data->title=$request->title;
        if($request->has('checkStatus'))
        {
            $data->status = 1;
        }
        else{
            $data->status = 0;
        }
        $data->save();
        return redirect('/category/index');

    }
    public function show(Request $request, $id)
    {
        //$data= Category::where('id',$id)->first();    //->where('id',$id)->first(); find($id); findOrFail($id); gives single rec
        $data=Category::findOrFail($id);
        dd($data);
    }
    public function store(Request $request)
    {
       //   $request->validate([
       //     'title' => 'required|max:255',
       //     'checkStatus'=> 'required'
           
       // ]);
         
        // dd($request->all());
        $category = new Category;
        $category->title = $request->title;
        
        if($request->has('checkStatus'))
        {
        $category->status = 1;
        }
        else{
            $category->status = 0;
        }
        $category->save();
        return redirect('/category/index');

    }
}