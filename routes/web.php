<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController};
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

Route::get('/{limit?}', [PostController::class, 'index'])
	->where('limit', '[0-9]');
Route::get('/post/{post}', [PostController::class, 'onePost']);
Route::get('/admin', [PostController::class, 'admin']);
Route::get('/admin/posts', [PostController::class, 'allPosts']);
Route::get('/admin/posts/add', [PostController::class, 'addPosts']);
Route::get('/admin/categories/{id?}', [PostController::class , 'allCategories'])
	->where('id', '[0-9]');
Route::get('/admin/comments', [PostController::class , 'allComments']);
