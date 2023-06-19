<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\BlogPost;
use App\Models\PostCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
         $user = JWTAuth::parseToken()->authenticate();

        // if ($user->hasRole('admin')) {
        if ($user->hasPermissionTo('read categories')) {
            $categories = Category::all();
            return response()->json($categories);
        } else {
            return response()->json(["message"=>"You do not have sufficient permissions"]);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         try {
            $request->validate([
                'name' => 'required|unique:categories',
                'description' => 'required'
            ]);

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user->hasPermissionTo('create categories')) {
                return response()->json(['message' => 'You do not have enough permission.'], 403);
            }

            $category = Category::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                // 'user_role' => $request->input('user_role')
            ]);


            return response()->json($category, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get category based on the post id
       try {
        $category = BlogPost::find($id)->categories;
         return response()->json($category, 201);
     } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $authUser = JWTAuth::parseToken()->authenticate();
        $category = Category::findOrFail($id);

        if ($authUser->hasPermissionTo('update users')) { // Updated line
            $request->validate([
                'name' => 'sometimes',
                'description' => 'sometimes'
            ]);

            $data = $request->only('name', 'description');
            $category->update($data);

            if ($request->has('posts')) {
                $postIds = $request->input('posts');
                $category->posts()->sync($postIds); // Updated line
            }

            return response()->json($category);
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
        $category = Category::findOrFail($id);

        if ($authUser->hasPermissionTo('delete categories')) {
            $category->posts()->detach();
            $category->delete();
            return response()->json(['Status'=>'S', 'Message'=>'Successfully Deleted']);
        }

        return response()->json(['error'=>'You are unauthorized, or you do not have sufficient permisssions']);
    }
}
