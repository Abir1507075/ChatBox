<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Events\userPresent;
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

Route::get('/',[HomeController::class, 'index']);
Route::get('/posts',[HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/home',[HomeController::class,'store']);
Route::get('/getpost',[HomeController::class,'ajaxGet']);

Route::post('/message/{user}',[MessageController::class,'create'])->name('send-message');
Route::get('/message/{user}',[MessageController::class,'show'])->name('get-message');

Route::get('/users/{user}',[HomeController::class,'show']);
Route::post('/users/{user}',[HomeController::class,'save']);

Auth::routes();





