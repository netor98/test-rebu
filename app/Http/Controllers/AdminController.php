<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function index() {
        $products = Product::all();
       
        return view('admin', compact('products'));
    }


    public function create() {
        return view('add-product');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:users',
                'cuantity' => 'required|numeric',
                'price' => 'required|numeric',
                'active' => 'required|numeric',
                'image' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );

        $file_path = storage_path('app/public/uploads');
        $insert = new Product();
        $insert->name = $request->name;
        $insert->cuantity = $request->cuantity;
        $insert->price = $request->price;
        $insert->active = $request->active;
        $insert->description = 'En desarrollo';

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
 
            $file->move($file_path, $file_name);
            $insert->image = $file_name;
        }

        $result = $insert->save();
        return redirect()->route('admin');
    }

    public function edit($id)
    {
        $edit = Product::findOrFail($id);
        return view('add-product', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:users',
                'cuantity' => 'required|numeric',
                'price' => 'required|numeric',
                'active' => 'required|numeric',
                'image' => 'mimes:png,jpeg,jpg|max:2048',
            ]
        );

        $update = Product::findOrFail($id);
        $update->name = $request->name;
        $update->cuantity = $request->cuantity;
        $update->price = $request->price;
        $update->active = $request->active;
        $update->description = 'En desarrollo';
 
        if ($request->hasfile('image')) {
            $filePath = public_path('uploads');
            $file = $request->file('image');
            $file_name = time() . $file->getClientOriginalName();
            $file->move($filePath, $file_name);
            // delete old image
            if (!is_null($update->image)) {
                $oldImage = public_path('uploads/' . $update->image);
                if (File::exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $update->image = $file_name;
        }
        $result = $update->save();
        return redirect()->route('admin');

    }



    public function delete(Request $request)
    {
        if($request->id) {
            $update = Product::findOrFail($request->id);
            $update->active = 0;
            $result = $update->save();
        }

    }
    
}