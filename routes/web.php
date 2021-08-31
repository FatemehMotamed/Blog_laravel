<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;

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

Route::get('/', [ArticleController::class, 'index']);
Route::get('/article/create', [ArticleController::class, 'create']);
//Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post("/article/{article}/comment", [CommentController::class, 'store'])->name('comment.store');
Route::get("/auth/login", [MainController::class,'login'])->name('auth.login');
Route::get("/auth/logout", [MainController::class,'logout'])->name('auth.logout');
Route::get("/auth/register", [MainController::class,'register'])->name('auth.register');
Route::post("/auth/save", [MainController::class,'save'])->name('auth.save');
Route::post("/auth/chek", [MainController::class,'check'])->name('auth.check');
Route::get("/admin/dashboard", [MainController::class,'dashboard']);
