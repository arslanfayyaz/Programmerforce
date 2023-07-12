<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post1;
use App\Models\Category;

class Post1Controller extends Controller
{
    //

    // public function index()
    // {
     
    //    $posts= Post1::latest();

    //    if(request('search')){

    //         $posts->where('name','like','%' . request('search'). '%')
    //         ->orWhere('body', 'like','%' . request('search'). '%');
    //    }

    //    return view('posts',[

    //         '$posts' => $posts->get(),
    //         'categories' => Category::all()

    //    ])    
    // }

    // public function show(Post $post){

    //       return view('post',[

    //               'post'=>$post
    //       ]);


    // }
}
