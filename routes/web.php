<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\OrdersController;


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
});

Route::resource('products', ProductController::class);



Route::delete('/cart/remove/{id}', [ProductController::class, 'removeItem'])->name('cart.remove');
Route::delete('/cart/clear', [ProductController::class, 'checkout'])->name('cart.checkout');


Route::post('/add-to-cart/{pizzaId}', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');

Route::post('/producten/storeUnit', [ProductController::class, 'storeUnit'])->name('products.storeUnit');
Route::post('/producten/storeIngredient', [ProductController::class, 'storeIngredient'])->name('products.storeIngredient');
Route::post('/producten/storePizza', [ProductController::class, 'storePizza'])->name('products.storePizza');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
Route::patch('/admin/orders/{order}', [AdminOrderController::class, 'update'])->name('admin.orders.update');

Route::patch('/admin/orders/{order}', [OrdersController::class, 'updateStatus'])->name('admin.orders.update');

Route::get('/products/edit-unit/{id}', [ProductController::class, 'editUnit'])->name('products.editUnit');
Route::get('/products/edit-ingredient/{id}', [ProductController::class, 'editIngredient' ])->name('products.editIngredient');
Route::get('/products/edit-pizza/{id}', [ProductController::class, 'editPizza'])->name('products.editPizza');

Route::patch('/products/update-unit/{id}', [ProductController::class, 'updateUnit'])->name('products.updateUnit');
Route::patch('/products/update-ingredient/{id}', [ProductController::class, 'updateIngredient'])->name('products.updateIngredient');
Route::patch('/products/update-pizza/{id}', [ProductController::class, 'updatePizza'])->name('products.updatePizza');

Route::delete('/products/remove-unit/{id}', [ProductController::class, 'removeUnit'])->name('products.removeUnit');
Route::delete('/products/remove-ingredient/{id}', [ProductController::class, 'removeIngredient'])->name('products.removeIngredient');
Route::delete('/products/remove-pizza/{id}', [ProductController::class, 'removePizza'])->name('products.removePizza');

Route::get('home', [ProductController::class, 'home'])->name('home');





require __DIR__.'/auth.php';
