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

// Routes for companys


Route::get('/companies',[CompanyController::class,'index']);

Route::get('/companies/{company}',[CompanyController::class,'show']);

Route::post('/companies',[CompanyController::class,'store']);

Route::patch('/companies/{company}',[CompanyController::class,'update']);

Route::delete('/companies/{company}',[CompanyController::class,'destroy']);

//Route::get('/companies/{company}/companies',[CompanyController::class,'under']);


// Routes for users

Route::get('/companies/{company}/users',[UserController::class,'index']);

Route::get('/companies/{company}/users/{user}',[UserController::class,'show']);

Route::post('/companies/{company}/users', [UserController::class,'store']);

Route::patch('/companies/{company}/users/{user}',[UserController::class,'update']);

Route::delete('/companies/{company}/users/{user}',[UserController::class,'destroy']);



// Routes for Category
Route::get('/users/{user}/categories',[CategoryController::class,'index']);

Route::get('/users/{user}/categories/{category}',[CategoryController::class,'show']);

Route::post('/users/{user}/categories',[CategoryController::class,'store']);

Route::patch('/users/{user}/categories/{category}',[CategoryController::class,'update']);

Route::delete('/users/{user}/categories/{category}',[CategoryController::class,'destroy']);



// Routes for Post
Route::get('/users/{user}/posts',[PostController::class,'index']);

Route::get('/users/{user}/posts/{post}',[PostController::class,'show']);

Route::post('/users/{user}/posts',[PostController::class,'store']);

Route::patch('/users/{user}/posts/{post}',[PostController::class,'update']);

Route::delete('/users/{user}/posts/{post}',[PostController::class,'destroy']);





// Routes for Tag
Route::get('/users/{user}/tags',[TagController::class,'index']);

Route::get('/users/{user}/tags/{tag}',[TagController::class,'show']);

Route::post('/users/{user}/tags',[TagController::class,'create']);

Route::patch('/users/{user}/tags/{tag}',[TagController::class,'update']);

Route::delete('/users/{user}/tags/{tag}',[TagController::class,'destroy']);


// Routes for Comment
Route::get('/users/{user}/comments',[CommentController::class,'index']);

Route::get('/users/{user}/comments/{comment}',[CommentController::class,'show']);

Route::post('/users/{user}/comments',[CommentController::class,'store']);

Route::patch('/users/{user}/comments/{comment}',[CommentController::class,'update']);

Route::delete('/users/{user}/comments/{comment}',[CommentController::class,'destroy']);


// Routes for PostTag
Route::get('/posts/{post}/posttags', [PostTagController::class, 'index']);

Route::get('/tags/{tag}/posttags', [PostTagController::class, 'show']);

Route::post('/posts/{post}/posttags', [PostTagController::class, 'store']);

Route::delete('/posts/{post}/posttags/{tag}', [PostTagController::class, 'destroy']);
});