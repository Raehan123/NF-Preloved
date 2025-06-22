<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ItemController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Jual Produk


Route::get('/jual-produk', [ItemController::class, "index"])->name('items.index');
Route::get('/jual-produk/create', [ItemController::class, "create"])->name('items.create');
Route::post('/jual-produk', [ItemController::class, "store"])->name('items.store');
Route::get('/jual-produk/{item}/edit', [ItemController::class, "edit"])->name('items.edit');
Route::put('/jual-produk/{item}', [ItemController::class, "update"])->name('items.update');
Route::get('/jual-produk/{item}', [ItemController::class, "show"])->name('items.show');
Route::delete('/jual-produk/{item}', [ItemController::class, "destroy"])->name('items.destroy');

// Wishlist

Route::get('/wishlist', [WishlistController::class, "index"])->name('wishlist.index');
Route::get('/wishlist/{item}/show', [WishlistController::class, "show"])->name('wishlist.show');
Route::post('/wishlist/toggle/{item}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
Route::delete('/wishlist/{item}', [WishlistController::class, "destroy"])->name('wishlist.destroy');


require __DIR__.'/auth.php';
