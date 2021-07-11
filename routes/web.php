<?php

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
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');
