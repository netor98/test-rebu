<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{


    public function index() {
        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function addProductToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['cuantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "cuantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', $product->name . ' ha sido agregado al carrito');
    }


    public function deleteProduct(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Producto eliminado correctamente');
        }
    }

    public function checkOut(Request $request) {
        $cart = session('cart');

        // Iterar sobre los detalles del carrito
        foreach ($cart as $id => $details) {
            // Obtener el producto actual del carrito desde la base de datos
            $product = Product::find($id);
            
            // Verificar si la cantidad deseada es mayor que la cantidad disponible en stock
            if ($details['cuantity'] > $product->cuantity) {
                return redirect()->back()->with('error', 'No hay suficiente stock del producto ' . $product->name);
            }
    
            // Restar la cantidad deseada del stock del producto en la base de datos
            $product->cuantity -= $details['cuantity'];
            $product->save();
            session()->put('cart', []);
            
            return redirect()->route('shop')->with('checkout', 'Se ha realizado la compra con exito');
        }
    }
}
