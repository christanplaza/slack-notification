<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Notifications\DeletedUser;
use App\Notifications\UpdatedUser;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit(User $user)
    {
        return view ('users.update', compact('user'));
    }
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->notify(new UpdatedUser($user));

        return redirect('/users')->with('success', 'User updated!');
    }
    
    public function destroy(User $user)
    {
        $temp = $user;
        $user->delete();

        $temp->notify(new DeletedUser());

        return redirect('/users')->with('success', 'User deleted!');
    }
}
