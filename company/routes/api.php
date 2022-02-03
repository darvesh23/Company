<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\tagsController;
use App\Http\Controllers\commentsController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\posttagController;

Route::post('/login', [JWTController::class,'login']);

Route::post('/logout', [JWTController::class,'logout']);

Route::get('/user', [JWTController::class,'profile']);

// Routes for Company

Route::get('/companies/{id}',[companyController::class,'show']);

Route::post('/companies',[companyController::class,'store']);

Route::put('/companies/{id}',[companyController::class,'update']);

Route::delete('/companies/{id}',[companyController::class,'destroy']);






Route::group(['middleware' => ['jwt.verify']], function() {

// Routes for Users

Route::get('/companies/{companyId}/user/{id}',[usersController::class,'show']);

Route::post('/companies/{companyId}/user', [usersController::class,'store']);

Route::put('/companies/{companyId}/user/{id}',[usersController::class,'update']);

Route::delete('/companies/{companyId}/user/{id}',[usersController::class,'destroy']);

// Routes for Post

Route::get('/users/{userId}/posts/{id}',[postsController::class,'show']);

Route::post('/users/{userId}/posts',[postsController::class,'store']);

Route::put('/users/{userId}/posts/{id}',[postsController::class,'update']);

Route::delete('/users/{userId}/posts/{id}',[postsController::class,'destroy']);




// Routes for Category
Route::get('/users/{userId}/categories',[categoriesController::class,'index']);

Route::get('/users/{userId}/categories/{id}',[categoriesController::class,'show']);

Route::post('/users/{userId}/categories',[categoriesController::class,'store']);

Route::put('/users/{userId}/categories/{id}',[categoriesController::class,'update']);

Route::delete('/users/{userId}/categories/{id}',[categoriesController::class,'destroy']);



// Routes for Tag
Route::get('/users/{userId}/tags',[tagsController::class,'index']);

Route::get('/users/{userId}/tags/{id}',[tagsController::class,'show']);

Route::post('/users/{userId}/tags',[tagsController::class,'create']);

Route::put('/users/{userId}/tags/{id}',[tagsController::class,'update']);

Route::delete('/users/{userId}/tags/{id}',[tagsController::class,'destroy']);


// Routes for Comment
Route::get('/users/{userId}/comments',[commentsController::class,'index']);

Route::get('/users/{userId}/comments/{id}',[commentsController::class,'show']);

Route::post('/users/{userId}/comments',[commentsController::class,'create']);

Route::put('/users/{userId}/comments/{id}',[commentsController::class,'update']);

Route::delete('/users/{userId}/comments/{id}',[commentsController::class,'destroy']);



Route::get('/posttags/{post_id}',[posttagController::class,'index']);

Route::post('/posttags',[posttagController::class,'store']);

Route::delete('/posttags/{postId}/{tagId}',[posttagController::class,'destroy']);
});