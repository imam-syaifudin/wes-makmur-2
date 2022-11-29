<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/index', [IndexController::class, 'index']);
Route::get('/post/view/{post}', [IndexController::class, 'view']);
Route::get('/rekomendasi', [IndexController::class, 'rekomendasi']);
Route::post('/rekomendasi/create', [IndexController::class, 'addRekomendasi']);

Route::middleware(['auth', 'admineditor'])->group(function () {
    route::resource('kategori',KategoriController::class);
    route::resource('post',PostController::class);
    route::resource('produk',ProdukController::class);
});
Route::middleware(['auth', 'isadmin'])->group(function () {
    route::get('post/hide/{post}',[PostController::class,'hide'])->middleware('isadmin');
    route::get('produk/hide/{post}',[ProdukController::class,'hide'])->middleware('isadmin');
    route::resource('user',UserController::class)->middleware('isadmin');
});

