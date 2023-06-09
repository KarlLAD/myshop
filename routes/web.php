<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('accueil');

Route::get('/filtre/{id}', [ProductController::class, 'index'])->name('accueil');

Route::get('/detail/{product}', [ProductController::class, 'detail'])->name('accueil.detail');

Route::get('/addtocart/{product}', [ProductController::class, 'addToCart'])->name('addtocart');



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ajouter le produit si utilisateur
    Route::get('/addtocart/{product}', [ProfileController::class, 'addtocart'])->name('addtocart');

    // lister le panier
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    // ajouter au panier si
    Route::get('/addtocart/{product}', [CartController::class, 'add'])->name('addtocart');


    // Route::get('/cart', [CartController::class, 'index'])->name('cart');

    // Route::get('/addtocart/{product}', [CartController::class, 'add'])->name('addtocart');

});

require __DIR__ . '/auth.php';
