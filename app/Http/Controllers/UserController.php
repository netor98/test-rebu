<?php
namespace App\Http\Controllers;

use App\Models\UserList;

class UserController extends Controller
{
    public function index()
    {
        $users = UserList::all();
        return view('users.index', compact('users'));
    }
}
