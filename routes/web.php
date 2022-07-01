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

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/post/list', [App\Http\Controllers\PostController::class, 'index'])->name('postList');
Route::get('/post/add', [App\Http\Controllers\PostController::class, 'add'])->name('postCreate');
Route::post('/post/add', [App\Http\Controllers\PostController::class, 'create']);

Route::get('/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('postEdit');
Route::put('/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('update');
Route::get('/post/details/{id}', [App\Http\Controllers\PostController::class, 'detail'])->name('postDetail');
Route::get('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('DeletePost');

Route::post('/comments/add', [App\Http\Controllers\CommentController::class, 'comment']);
Route::get('/comments/delete/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('DeleteComment');