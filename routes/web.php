<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\SaleController;
use App\Http\Controllers\Backend\backendController;
use App\Http\Controllers\Backend\productController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [backendController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', [backendController::class, 'index'])->name('home');
/*
|--------------------------------------------------------------------------
| Admin Section product Routes
|--------------------------------------------------------------------------
*/

Route::get('/products', [productController::class, 'show'])->name('products.show');
Route::get('product/create', [productController::class, 'create'])->name('product.create');
Route::post('product/store', [productController::class, 'store'])->name('product.store');
Route::get('product/edit/{id}', [productController::class, 'edit'])->name('product.edit');
Route::post('product/{id}', [productController::class, 'update'])->name('product.update');
Route::get('product/{id}', [productController::class, 'destroy'])->name('product.delete');

Route::get('/sales', [SaleController::class, 'index'])->name('sales.show');
Route::post('sale/store', [SaleController::class, 'store'])->name('sale.store');


});

//Routing Group without Middleware

/*
|--------------------------------------------------------------------------
| Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| End of Admin Web Routes with admin prefix
|--------------------------------------------------------------------------
*/
