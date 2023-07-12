<?php

use Illuminate\Support\Facades\Route;
use App\Models\welcome;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Category1;
use App\Models\Post1Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/{post}',function($slug){
     // return $slug;  // return name of the file which we enter in the url and put into {post} and pass into function parameter slug
   // return view('welcome1',[
    // 'post'=> file_get_contents(__DIR__ . '/../posts/my-first-post.html')
        $path= __DIR__ . "/../public/posts/{$slug}.html";
        if(! file_exists($path)){
             dd('file not exist');
            // return redirect('/')
           // abort('404');
        }

        // $post= cache()->remember("posts.{$slug}",5,fn()=> file_get_contents($path));


        // });
        $post= file_get_contents($path);
        return view('welcome1',[
            'post' => $post

    ]);
 })->where('post','[a-z_\-]+');

//find a post  by its slug and pass it to a view called welcome

Route::get('/post/{post}',function($slug){
   
    return view('welcome1',[

          'post'=> welocme::find($slug)
    ]);

});

Route::get('/',function(){

    // $posts=welcome::all();
    // dd($posts[1]->getContents());
    // dd($posts);
    // dd($posts[0]->getContent());


    return view('welcome1',[
           'posts' => welcome::all()
 
    ]);

});

// Route::get('categories/{subcategory}',function(SubCategory $subcategory){
   
//           return view('welcome1',[

//                 'posts'=> $subcategory->posts
//           ]);

// })

Route::get('categories/{category:slug}', function (Category1 $category) { //slug main hm jo name enter krain gay wo $category main slug column say match ho ga
    return view('post', [
        'post'=> $category->name,
        'category'=>$category->description,
        'body'=>$category->slug
    ]);
});

// Route::get('/search',[PostController::class,index]);
// Route::get('posts/{post:slug}',[PostController::class,show]);


       // $posts= Post1::latest();

       // if(request('search')){

       //      $posts->where('name','like','%' . request('search'). '%')
       //      ->orWhere('body', 'like','%' . request('search'). '%');
       // }

       // return view('posts',[

       //      '$posts' => $posts->get(),
       //      'categories' => Category::all()

       // ])
// });

Route::view('noaccess','noaccesspage');

//User

Route::get('user/index',[UserController::class,'index']);
Route::get('user/{id}/edit',[UserController::class,'edit']);
Route::get('user/create', [UserController::class,'create']);
Route::post('user/store',[UserController::class,'store']);
Route::get('user/{id}/show',[UserController::class,'show']);
Route::put('user/{id}/update',[UserController::class,'update']);
//post

Route::get('post/index',[PostController::class,'index']);
Route::get('post/{id}/edit',[PostController::class,'edit']);
Route::get('post/create', [PostController::class,'create']);
Route::post('post/store',[PostController::class,'store']);
Route::get('post/{id}/show',[PostController::class,'show']);
Route::put('post/{id}/update',[PostController::class,'update']);
