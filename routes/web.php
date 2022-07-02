<?php

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


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('index');

Route::get('/post/list', [App\Http\Controllers\PostController::class, 'index'])->name('postList');
// post create
Route::get('/post/add', [App\Http\Controllers\PostController::class, 'add'])->name('postCreate');
Route::post('/post/add', [App\Http\Controllers\PostController::class, 'create']);
//post update
Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('postEdit');
Route::put('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('update');
//post deteail
Route::get('/post/details/{id}', [App\Http\Controllers\PostController::class, 'detail'])->name('postDetail');
//post delete
Route::get('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('DeletePost');
//comment add and delete
Route::post('/comments/add', [App\Http\Controllers\CommentController::class, 'comment']);
Route::get('/comments/delete/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('DeleteComment');
//view auth user post
Route::get('/post/mypost', [App\Http\Controllers\PostController::class, 'mypost'])->name('myPost');