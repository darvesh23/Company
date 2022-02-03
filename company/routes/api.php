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

Route::post('/logout', [JWTController::class,'logout']);

Route::get('/user', [JWTController::class,'profile']);

//Route::post('/register', [JWTController::class,'store']);






Route::group(['middleware' => ['jwt.verify']], function() {


 // Routes for Company

Route::get('/companys/{id}',[CompanyController::class,'show']);

Route::post('/companys',[CompanyController::class,'store']);

Route::patch('/companys/{id}',[CompanyController::class,'update']);

Route::delete('/companys/{id}',[CompanyController::class,'destroy']);


// Routes for users

Route::get('/companys/{company}/users/{id}',[UserController::class,'show']);

Route::post('/companys/{company}/users', [UserController::class,'store']);

Route::patch('/companys/{company}/users/{id}',[UserController::class,'update']);

Route::delete('/companys/{company}/users/{id}',[UserController::class,'destroy']);

// Routes for Post

Route::get('/users/{user}/posts/{id}',[PostController::class,'show']);

Route::post('/users/{user}/posts',[PostController::class,'store']);

Route::patch('/users/{user}/posts/{id}',[PostController::class,'update']);

Route::delete('/users/{user}/posts/{id}',[PostController::class,'destroy']);




// Routes for Category
Route::get('/users/{user}/categorys',[CategoryController::class,'index']);

Route::get('/users/{user}/categorys/{id}',[CategoryController::class,'show']);

Route::post('/users/{user}/categorys',[CategoryController::class,'store']);

Route::patch('/users/{user}/categorys/{id}',[CategoryController::class,'update']);

Route::delete('/users/{user}/categorys/{id}',[CategoryController::class,'destroy']);



// Routes for Tag
Route::get('/users/{user}/tags',[TagController::class,'index']);

Route::get('/users/{user}/tags/{id}',[TagController::class,'show']);

Route::post('/users/{user}/tags',[TagController::class,'create']);

Route::patch('/users/{user}/tags/{id}',[TagController::class,'update']);

Route::delete('/users/{user}/tags/{id}',[TagController::class,'destroy']);


// Routes for Comment
Route::get('/users/{user}/comments',[CommentController::class,'index']);

Route::get('/users/{user}/comments/{id}',[CommentController::class,'show']);

Route::post('/users/{user}/comments',[CommentController::class,'create']);

Route::patch('/users/{user}/comments/{id}',[CommentController::class,'update']);

Route::delete('/users/{user}/comments/{id}',[CommentController::class,'destroy']);



Route::get('/posttags/{post_id}',[PostTagController::class,'index']);

Route::post('/posttags',[PostTagController::class,'store']);

Route::delete('/posttags/{postId}/{tagId}',[PostTagController::class,'destroy']);
});