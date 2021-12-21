<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('jwt.verify')->group(function () {
    Route::post('me', [LoginController::class, 'getAuthenticatedUser']);
    Route::post('logout', [LoginController::class, 'logout']);

    Route::prefix('users')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::post('/add', [AdminController::class, 'store']);
        Route::put('/editProfile', [UserController::class, 'editProfile']);
        Route::get('/getUserById',[UserController::class,'getUserById']);
        Route::delete('delete/{id}', [UserController::class, 'deletePost']);
        Route::get('/detail/{id}', [AdminController::class, 'showDetail']);
        Route::get('/posts', [UserController::class, 'getListPostsByUser']);
        Route::post('/create/post',[UserController::class,'createPost']);
        Route::post('changePassword', [LoginController::class, 'changePassword']);
        Route::get('/getCategories',[UserController::class,'getCategories']);
        Route::post('/updateImage',[UserController::class,'updateImage']);
        Route::get('/getPost/{id}',[UserController::class,'getPostById']);
        Route::post('/editPost/{id}',[UserController::class,'editPost']);
    });

    Route::prefix('posts')->group(function () {
        Route::post('create', [PostController::class, 'store']);
        Route::get('/', [PostController::class, 'index']);
        Route::put('/edit/{id}', [PostController::class, 'edit']);
        Route::delete('/{id}', [PostController::class, 'destroy']);
    });
});
Route::get('newest5', [PostController::class,'showPublicWithAuthor']);
Route::get('recent', [PostController::class,'showPostRecent']);
Route::post('/register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'authenticate']);
Route::prefix('ppl')->group(function (){
    Route::get('', [PostController::class,'showPublic']);
    Route::get('/category', [CategoryController::class, 'getCategory']);
    Route::get('/category/{id}', [CategoryController::class, 'DetailCategory']);

    Route::get('/posts/{id}' , [CategoryController::class, 'showPostByCategory']);
    Route::get('/ofUser/{id}', [PostController::class, 'showPublicWithAuthor']);
});
Route::get('posts/detail/{id}',[PostController::class,'showDetailPost']);
Route::post('/search', [PostController::class, 'findPost']);

