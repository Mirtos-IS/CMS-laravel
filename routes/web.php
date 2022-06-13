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
Route::post('/login/create', [RegisterController::class, 'register']);

//Routes for Admin panel
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin','admin');

    //Routes for Admin posts
    Route::get('/admin/posts', 'allPosts');

    Route::get('/admin/posts/add',  'addPosts');
    Route::post('/admin/posts/add', 'storePost');

    Route::get('/admin/posts/delete/{id}', 'destroyPost');

    Route::get('/admin/posts/edit/{id}', 'editPost');
    Route::put('/admin/posts/edit/{id}', 'updatePost');

    //Routes for Categories in Admin
    Route::get('/admin/categories/{id?}', 'allCategories')->where('id', '[0-9]');
    Route::post('/admin/categories/{id?}', 'storeCategory')->where('id', '[0-9]');
    Route::patch('/admin/categories/{id}', 'updateCategory')->where('id', '[0-9]');

    //Routes for Admin Comments
    Route::get('/admin/comments','allComments');
    
    Route::get('/admin/users', 'allUsers');
});
Route::delete('/admin/comments/{id}', [CommentsController::class , 'deleteComment']);

//Routes for Emails
Route::get('/email/{name}', [EmailController::class, 'email']);

Route::get('/sendemail', [EmailController::class, 'sendemail']);

