<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Models\Catalog;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::get('/', [ProductController::class,'mainContent']);

Route::resource('products',ProductController::class);

Route::resource('catalogs',CatalogController::class);

Route::get('/catalogs/{catalog}', [CatalogController::class,'catalogView'])->name('catalog.view');

Route::group(['middleware' => ['role:admin']], function () {
    $products = Product::query()->get();
    Route::view('admin', 'admin.adminPanel',[
        'products' => $products,
    ])->name('adminPanel');
});

Route::group(['middleware' => ['role:user|admin']], function () {
    Route::get('/add-to-cart/{product}', [CartController::class,'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class,'index'])->name('cart.cartView');
    Route::delete('/cart-item-delete/{rowId}', [CartController::class,'delete'])->name('cart.delete');
    Route::delete('/cart-all-item-delete/', [CartController::class,'AllItemDelete'])->name('cart.Alldelete');
});
