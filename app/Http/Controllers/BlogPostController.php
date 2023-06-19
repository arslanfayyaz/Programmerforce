<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = JWTAuth::parseToken()->authenticate();

        // if ($user->hasRole('admin')) {
        if ($user->hasPermissionTo('read posts')) {
            $posts = BlogPost::all();
            return response()->json($posts);
        } else {
            return response()->json(["message"=>"You do not have sufficient permissions"]);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|unique:blog_posts',
                'content' => 'required',
                'categoryIds' => 'required|array'
            ]);

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user->hasPermissionTo('create posts')) {
                return response()->json(['message' => 'You do not have enough permission.'], 403);
            }

            $blogpost = BlogPost::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'user_id' => $user->id,
                // 'user_role' => $request->input('user_role')
            ]);

            $blogpost->categories()->attach($request->input('categoryIds'));

            return response()->json($blogpost, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // show post based on the category id
          try {
        $category = Category::find($id)->posts;
         return response()->json($category, 201);
     } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authUser = JWTAuth::parseToken()->authenticate();
        $post = BlogPost::findOrFail($id);

        if ($authUser->id == $post->user_id) {
            $request->validate([
                //sometimes means this field is optional either we put the value or not
                'title' => 'sometimes',
                'content' => 'sometimes'
            ]);

            $data = $request->only('title', 'content');
            $post->update($data);

            if ($request->has('categories')) {
                $categoryIds = $request->input('categories');
                $post->categories()->sync($categoryIds);
            }

            return response()->json($post);
        } else if ($authUser->hasPermissionTo('update posts')) {
            $request->validate([
                'title' => 'sometimes',
                'content' => 'sometimes'
            ]);

            $data = $request->only('title', 'content');
            $post->update($data);

            if ($request->has('categories')) {
                $categoryIds = $request->input('categories');
                $post->categories()->sync($categoryIds);
            }

            return response()->json($post);
        }

        return response()->json(['error' => 'You are not authorized, or you do not have sufficient permissions'], 403);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

         $authUser = JWTAuth::parseToken()->authenticate();
        $post = BlogPost::findOrFail($id);

        if ($authUser->id == $post->user_id || $authUser->hasPermissionTo('delete posts')) {
            $post->categories()->detach();
            $post->delete();
            return response()->json(['Status'=>'S', 'Message'=>'Successfully Deleted']);
        }

        return response()->json(['error'=>'You are unauthorized, or you do not have sufficient permisssions']);
    }
}