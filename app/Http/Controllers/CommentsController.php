<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\BlogPost;
use App\Models\User;

class CommentsController extends Controller
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
            $comment = Comments::all();
            return response()->json($comment);
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

                'blogpost_id' => 'required|exists:blog_posts,id',
                'user_id' => 'required|exists:users,id',
                'content' => 'required'
        ]);

            $user = JWTAuth::parseToken()->authenticate();

            if (!$user->hasPermissionTo('read posts')) {
                return response()->json(['message' => 'You do not have enough permission.'], 403);
            }

            $comment = Comments::create([
                'blogpost_id' => $request->input('blogpost_id'),
                'user_id' => $request->input('user_id'),
                'content' => $request->input('content'),
                // 'user_role' => $request->input('user_role')
            ]);

            return response()->json($comment, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

         $authUser = JWTAuth::parseToken()->authenticate();
         $comment = Comments::findOrFail($id);
        if ( $authUser->hasPermissionTo('read posts')) {
            $data = $comment->only(['content']);
            return response()->json($data);
        }

        return response()->json(['error'=>'Unauthorized'], 403);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         $authUser = JWTAuth::parseToken()->authenticate();
        $comment = Comments::findOrFail($id);

        if ($authUser->hasPermissionTo('update posts')) { // Updated line
            $request->validate([
                'content' => 'sometimes'
            ]);

            $data = $request->only('content');
            $comment->update($data);

            return response()->json($comment);
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
        $comment = Comments::findOrFail($id);

        if ($authUser->hasPermissionTo('delete posts')) {
            $comment->post()->detach();
            $comment->delete();
            return response()->json(['Status'=>'S', 'Message'=>'Successfully Deleted']);
        }

        return response()->json(['error'=>'You are unauthorized, or you do not have sufficient permisssions']);
    }
}
