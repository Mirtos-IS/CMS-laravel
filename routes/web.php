<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController, 
						  AdminController, 
						  RegisterController, 
						  LogController,
                          CommentsController,
						  EmailController};
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
Route::post('/post/{post}', [CommentsController::class, 'storeComment']);

//Routes for all Log functionality
Route::get('/login', [LogController::class, 'login'])
	->name('login');
Route::get('/logout', [LogController::class, 'logout']);
Route::post('/login', [LogController::class, 'loginAuth']);

Route::get('/login/create', [LogController::class, 'create']);
Route::post('/login/create', [RegisterController::class, 'store']);

//Routes for Admin panel
Route::get('/admin', [AdminController::class, 'admin']);

//Routes for Admin posts
Route::get('/admin/posts', [AdminController::class, 'allPosts']);

Route::get('/admin/posts/add', [AdminController::class, 'addPosts']);
Route::post('/admin/posts/add', [AdminController::class, 'storePost']);

Route::get('/admin/posts/delete/{post_id}', [AdminController::class, 'destroyPost']);

Route::get('/admin/posts/edit/{post_id}', [AdminController::class, 'editPost']);
Route::put('/admin/posts/edit/{post_id}', [AdminController::class, 'updatePost']);

//Routes for Categories in Admin
Route::get('/admin/categories/{id?}', [AdminController::class , 'allCategories'])
	->where('id', '[0-9]');

//Routes for Admin Comments
Route::get('/admin/comments', [AdminController::class , 'allComments']);
Route::delete('/admin/comments/{id}', [CommentsController::class , 'deleteComment']);

//Routes for admin Users
Route::get('/admin/users', [AdminController::class,  'allUsers']);

//Routes for Emails
Route::get('/email/{name}', [EmailController::class, 'email']);

Route::get('/sendemail', [EmailController::class, 'sendemail']);

