<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
   
    return view('index');
});

Route::get('/show-structure', function () {
    // Obtener la estructura de archivos
    $directory = base_path();
    $structure = recursiveFileStructure($directory);
    
    // Mostrar la estructura de archivos
    dd($structure);
});

// Función para obtener la estructura de archivos de forma recursiva
function recursiveFileStructure($directory) {
    $files = [];

    $items = scandir($directory);
    foreach ($items as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        $path = $directory . '/' . $item;
        if (is_dir($path)) {
            $files[$item] = recursiveFileStructure($path);
        } else {
            $files[] = $item;
        }
    }

    return $files;
}


Route::get('/linkstorage', function () {
    $target = 'storage/app/public';
    $shortcut = '/storage';
    symlink($target, $shortcut);
});

Route::get('/run-script', function () {
    $output = shell_exec('sh /create_storage_link.sh');
    dd($output);
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/create-account', [RegisterController::class, 'index'])->name('register');
Route::post('/create-account', [RegisterController::class, 'store']);


Route::get('/shop', [PostController::class, 'index'])->name('shop')->middleware('auth');
Route::get('/shop/{id}', [PostController::class, 'addProductToCart'])->name('add.to.cart');
Route::post('/checkout', [PostController::class, 'checkOut'])->name('checkout');

Route::delete('/delete-cart-product', [PostController::class, 'deleteProduct'])->name('delete.cart.product');


Route::get('/details', [BuyController::class, 'index'])->name('details');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin-create', [AdminController::class, 'create'])->name('product.create');

Route::post('/add-product', [AdminController::class, 'store'])->name('create.product');
Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('product.edit');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('product.update');
Route::delete('/delete', [AdminController::class, 'delete'])->name('product.delete');









