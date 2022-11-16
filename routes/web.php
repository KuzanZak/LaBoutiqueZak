<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ListProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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

Route::get('/', [HomePageController::class, "index"])->name('homepage');
Route::get('/products', [ListProductsController::class, "index"])->name('list-products');
// Route::get('/products/sortByPriceDesc', [ListProductsController::class, "sortByPriceDesc"])->name('list-products/sortByPriceDesc');

Route::get('/dashboard/account', [AccountController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/account');
Route::get('/dashboard/account/edit_{iduser}', [AccountController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/account/edit');
Route::post('/dashboard/account/update_{iduser}', [AccountController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/account/update');



Route::get('/dashboard', function () {
    return view('dashboard-account');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/dashboard/image', [ImageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/image');
Route::get('/dashboard/image/create', [ImageController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/image/create');
Route::post('/dashboard/image/add', [ImageController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/image/add');
Route::get('/dashboard/image/edit_{idimage}', [ImageController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/image/edit');
Route::post('/dashboard/image/update_{idimage}', [ImageController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/image/update');
Route::get('/dashboard/image/delete_{idimage}', [ImageController::class, 'destroy'])->name('dashboard/image/delete');

Route::get('/dashboard/role', [RoleController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/role');
Route::get('/dashboard/role/create', [RoleController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/role/create');
Route::post('/dashboard/role/add', [RoleController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/role/add');
Route::get('/dashboard/role/edit_{idrole}', [RoleController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/role/edit');
Route::post('/dashboard/role/update_{idrole}', [RoleController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/role/update');
Route::get('/dashboard/role/delete_{idrole}', [RoleController::class, 'destroy'])->name('dashboard/role/delete');

Route::get('/dashboard/category', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/category');
Route::get('/dashboard/category/create', [CategoryController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/category/create');
Route::post('/dashboard/category/add', [CategoryController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/category/add');
Route::get('/dashboard/category/edit_{idcategory}', [CategoryController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/category/edit');
Route::post('/dashboard/category/update_{idcategory}', [CategoryController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/category/update');
Route::get('/dashboard/category/delete_{idcategory}', [CategoryController::class, 'destroy'])->name('dashboard/category/delete');

Route::get('/dashboard/product', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/product');
Route::get('/dashboard/product/create', [ProductController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/product/create');
Route::post('/dashboard/product/add', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/product/add');
Route::get('/dashboard/product/edit_{idproduct}', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/product/edit');
Route::post('/dashboard/product/update_{idproduct}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/product/update');
Route::get('/dashboard/product/delete_{idproduct}', [ProductController::class, 'destroy'])->name('dashboard/product/delete');
