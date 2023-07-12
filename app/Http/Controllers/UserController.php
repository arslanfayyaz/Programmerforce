<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User1;

class UserController extends Controller
{
    //
    public function index()
    {
        $users= User1::all();
        return view('user.index',compact('users'));

    }

    public function edit(Request $request, $id)
    {
         $user = User1::findOrFail($id);
         return view('user.edit',compact('user'));
    }
    public function create()
    {   
        return view('user.create');
    }
    public function update(Request $request,$id)
    {   
        $user = User1::find($id);
        $user->name=$request->username;
        $user->role= $request->enter_role;
        $user->save();
        return redirect('/user/index');
            
    }
    public function show(Request $request, $id)
    {
        $user=User1::findOrFail($id);
        dd($user);
    }
    public function store(Request $request)
    {
      
         $user= new User1;
         $user->name= $request->username;
         $user->role= $request->enter_role;
         $user->save();
         return redirect('/user/index');

    }
}
