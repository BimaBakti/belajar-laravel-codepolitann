<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
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

route::get('login',[AuthController::class,'login']);
route::post('login',[AuthController::class,'authenticate']);
route::get('logout',[AuthController::class,'logout']);
route::post('posts',[PostsController::class,'store']);//untuk memproses database, memasukkan data dari (FORM) ke database(TAMBAH DATA)
route::get('posts',[PostsController::class,'index']); //MENU UTAMA
route::get('posts/create',[PostsController::class,'create']);//(TAMBAH DATA)
route::get('posts/{id}',[PostsController::class,'show']); /* pejet f12 untuk lompat ke method di controller nya MENAMPILKAN DATA*/
route::get('posts/{id}/edit',[PostsController::class,'edit']);//EDIT DATA
route::patch('posts/{id}',[PostsController::class,'update']);//ini juga hanya untuk memproses data update (untuk meng edit butuh 2 route)(EDIT DATA)
route::delete('posts/{id}',[PostsController::class,'destroy']); //delete
//          nama endpoint, kelasnya      , metod didalam kelas
/* ADA 2 FUNGSI MEMBUTUHKAN 2 METHOD
1. MENAMBAH DATA\
    A. HALAMAN TAMBAH POSTTINGAN (GET)
    B. FUNGSI STORE UNTUK MEMPROSES , MEMASUKKAN DATA BARU DARI FORM TAMBAH (POST)
2. MENGEDIT DATA
    A. HALAMAN EDIT (GET)
    B. FUNGSI UPDATE UNTUK MEMPROSES DATA, MENIMPA DATA BARU DARI FORM DI HALAMAN EDIT(PATCH)
*/
