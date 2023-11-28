<?php

use App\Http\Controllers\posts\PostController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', function (){
    return view('contact');
});



Route::group(['prefix'=>'posts/'],function (){
    Route::get('/index', [PostController::class,'index'])->name('posts.index');
    Route::get('/{id}/single', [PostController::class,'single'])->name('posts.single');
    Route::post('/store-comment', [PostController::class,'StoreComment'])->name('store.comment');
    Route::get('/create-post', [PostController::class,'create'])->name('post.create');
    Route::post('/store-post', [PostController::class,'store'])->name('post.store');
    Route::post('/store-post', [PostController::class,'store'])->name('post.store');
    Route::get('/{id}/delete-post', [PostController::class,'delete'])->name('post.delete');
    Route::get('/{id}/edit', [PostController::class,'edit'])->name('post.edit');
    Route::PUT('/{id}/update', [PostController::class,'update'])->name('post.update');

});




