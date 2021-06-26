<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portofolio', function () {
    return view('portofolio');
});
Route::post('konfirmasi', function () {
    return view('konfirmasi');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/', [App\Http\Controllers\PostController::class, 'donasi'])->name('post.donasi');
Route::get('/post/create',  [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/post/create',  [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show'); //untuk show
Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit'); //untuk edit
Route::patch('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'update'])->name('post.update'); //untuk simpan perubahan
Route::delete('/post/{post}/delete', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');


Route::post('/upload', function (Request $request) {
    $request->image->store('images', 'public');
    return 'uploaded';
});
