<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function create() {
        return view('admin.users.create')
        ->with('user', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user = User::create($attributes);
        return redirect('/admin');
    }

    public function edit(User $user) {
        return view('admin.users.create')
        ->with('user', $user);
    }

    public function update(User $user, Request $request){
        $attributes = request()->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => ['required','min:8','confirmed'],
        ]);
        
        $user->update($attributes);
        session()->flash('success','User Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(User $user){
        $user->delete();

        session()->flash('success','User Deleted Successfully');

        return redirect('/admin');
    }
}
