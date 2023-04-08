<?php

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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::post('/subscribe',[\App\Http\Controllers\HomeController::class,'subscribe']);

Route::get('/articles/{id?}',[\App\Http\Controllers\ArticleController::class,'show'])->name('articles');


Route::get('/contact',[\App\Http\Controllers\ContactController::class,'show'])->name('contact');
Route::post('/checkContactData',[\App\Http\Controllers\ContactController::class,'checkContactData']);

Route::get('/category',[\App\Http\Controllers\CategoryController::class,'show'])->name('category');

Route::get('about',[\App\Http\Controllers\AboutController::class,'show'])->name('about');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [App\Http\Controllers\AuthController::class, 'isloggedin'])->name('haslogin');
