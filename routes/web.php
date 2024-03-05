<?php

use App\Http\Controllers\PostsController;
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

Route::get('/', function () {
    return view('welcome');
});
route::post('posts',[PostsController::class,'store']);//untuk memproses database, memasukkan data dari form ke database
route::get('posts',[PostsController::class,'index']);
route::get('posts/create',[PostsController::class,'create']);
route::get('posts/{id}',[PostsController::class,'show']); /* pejet f12 untuk lompat ke method di controller nya */
route::get('posts/{id}/edit',[PostsController::class,'edit']);
route::patch('posts/{id}',[PostsController::class,'update']);//ini juga hanya untuk memproses data update (untuk meng edit butuh 2 route)
//          nama endpoint, kelasnya      , metod didalam kelas

