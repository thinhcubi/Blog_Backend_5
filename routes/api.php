<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
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

Route::prefix('users')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/add', [AdminController::class, 'store']);
    Route::put('/edit/{id}', [AdminController::class, 'edit']);
    Route::delete('/{id}', [AdminController::class, 'delete']);
    Route::get('/detail/{id}', [AdminController::class, 'showDetail']);
});

Route::post('/register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'authenticate']);

Route::group(['/middleware' => ['jwt.verify']], function() {
    Route::post('user',[LoginController::class, 'getAuthenticatedUser']);
    Route::post('logout', [LoginController::class, 'logout']);

});
Route::get('user/posts',[\App\Http\Controllers\UserController::class,'getListPostsByUser']);
