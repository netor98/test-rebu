<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{

    public function index() {
        if (auth()->check()) {
            return redirect('shop');
        }

        return view('auth.login');
    }

    public function store(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('username', 'password'), $request->remember)) {
            return back()->with('mensaje', 'Credenciales incorrectas');
        }

        
        return redirect('shop');
    }

}
