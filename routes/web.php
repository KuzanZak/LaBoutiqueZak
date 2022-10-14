<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ImageController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/dashboard/image', [ImageController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard/image');
Route::get('/dashboard/image/create', [ImageController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard/image/create');
Route::post('/dashboard/image/add', [ImageController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard/image/add');
Route::get('/dashboard/image/edit_{idimage}', [ImageController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard/image/edit');
Route::post('/dashboard/image/update_{idimage}', [ImageController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard/image/update');
Route::get('/dashboard/image/delete_{idimage}', [ImageController::class, 'destroy'])->name('dashboard/image/delete');
