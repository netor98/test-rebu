<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    public function index() {
        $users = UserList::all();
        return view('auth.register', compact('users'));
    }

    public function store(Request $request) {

        $request->request->add(['username' => Str::slug($request->username)]);


        $request->validate([
            'name' => 'required|max:30|min:5|alpha:ascii',
            'username' => 'required|min:5|unique:users|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:5',
        ]);

        UserList::create([
            "user" => $request->username,
            "password" => $request->password
        ]);
        
        User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => $request->password
        ]);


        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        

        return redirect()->route('shop');
    }

}
