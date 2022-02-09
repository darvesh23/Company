<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostTagController;

Route::post('/login', [JWTController::class,'login']);



//Route::post('/register', [JWTController::class,'store']);


Route::group(['middleware' => ['jwt.verify']], function() {



Route::post('/logout', [JWTController::class,'logout']);

Route::get('/user', [JWTController::class,'profile']);

 // Route for Company
 Route::resource('companies', 'CompanyController');

 // Routes for user
 Route::resource('/companies/{company}/users', 'UserController');

 // Routes for Post
 Route::resource('/users/{user}/posts', 'PostController');

 // Routes for Category
 Route::resource('/users/{user}/categories', 'CategoryController');

 // Routes for Tag
 Route::resource('/users/{user}/tags', 'TagController');

 // Routes for Comment
 Route::resource('/users/{user}/comments', 'CommentController');

 // Routes for Post-Tag
 Route::resource('/posts/{post}/tags', 'PostTagController');

 Route::get('/tags/{tag}/posts', [PostTagController::class, 'show']);

});