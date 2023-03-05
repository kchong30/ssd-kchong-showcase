<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create() {
        return view('register_user.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email', 'unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect ('/');
    }
}