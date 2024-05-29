<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PublicController::class, 'hompage'])->name('hompage');
Route::get('/article/create' , [ArticleController::class , 'create'])->name('article.create');
Route::post('/artcile/store' , [ArticleController::class, 'store'])->name('article.store');
