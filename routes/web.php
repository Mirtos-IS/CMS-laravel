<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController, 
						  AdminController, 
						  RegisterController, 
						  LogController};
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

//Routes for the Blog, no auth require
Route::get('/{limit?}', [PostController::class, 'index'])
	->where('limit', '[0-9]');
Route::get('/post/{post}', [PostController::class, 'onePost']);

//Routes for all Log functionality
Route::get('/login', [LogController::class, 'login'])
	->name('login');
Route::get('/logout', [LogController::class, 'logout']);
Route::post('/login', [LogController::class, 'loginAuth']);

Route::get('/login/create', [RegisterController::class, 'create']);
Route::post('/login/create', [RegisterController::class, 'store']);

//Routes for Admin panel
Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/admin/posts', [AdminController::class, 'allPosts']);
Route::get('/admin/posts/add', [AdminController::class, 'addPosts']);
Route::get('/admin/categories/{id?}', [AdminController::class , 'allCategories'])
	->where('id', '[0-9]');
Route::get('/admin/comments', [AdminController::class , 'allComments']);
Route::get('/admin/users', [AdminController::class,  'allUsers']);
