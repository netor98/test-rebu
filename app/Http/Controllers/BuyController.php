<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class BuyController extends Controller
{
    public function index() {
       
        return view('cart');
    }
}