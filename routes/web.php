<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Category\CategoryContoller;
use App\Http\Controllers\posts\PostController;
use App\Http\Controllers\User\UserProdileController;
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



Route::get('/', [PostController::class,'index'])->name('posts.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', function (){
    return view('contact');
});
Route::get('/about', [PostController::class,'about'])->name('about');


Route::group(['prefix'=>'posts/'],function (){
    Route::get('/single/{id}', [PostController::class,'single'])->name('posts.single');
    Route::post('/store-comment', [PostController::class,'StoreComment'])->name('store.comment');
    Route::get('/create-post', [PostController::class,'create'])->name('post.create');
    Route::post('/store-post', [PostController::class,'store'])->name('post.store');
    Route::post('/store-post', [PostController::class,'store'])->name('post.store');
    Route::get('/{id}/delete-post', [PostController::class,'delete'])->name('post.delete');
    Route::get('/{id}/edit', [PostController::class,'edit'])->name('post.edit');
    Route::PUT('/{id}/update', [PostController::class,'update'])->name('post.update');
     Route::get('/search', [PostController::class,'search'])->name('post.search');

});
Route::get('/category/{name}', [CategoryContoller::class,'categories'])->name('category.name');


Route::group(['prefix'=>'user/'],function (){
    Route::get('edit/{id}', [UserProdileController::class,'edit'])->name('user.edit');
    Route::PUT('update/{id}', [UserProdileController::class,'update'])->name('user.update');
    Route::get('profile/{id}', [UserProdileController::class,'profile'])->name('user.profile');

});
    Route::get('admin/login', [AdminController::class,'login'])->name('admin.login')->middleware(['admin','IsAdmin']);
    Route::POST ('admin/login', [AdminController::class,'checklogin'])->name('admin.checklogin')->middleware('IsAdmin');;

Route::group(['prefix'=>'admin/',"middleware"=>['auth:admin']],function (){
    Route::get('Dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('Admin/List', [AdminController::class,'admin'])->name('admin.list');
    Route::get('create-admin', [AdminController::class,'create'])->name('admin.create');
    Route::post('store-admin', [AdminController::class,'store'])->name('admin.store');


    Route::get('Show-Categories', [AdminController::class,'Categories'])->name('category.show');
    Route::get('create-Categories', [AdminController::class,'createCategory'])->name('category.create');
    Route::post('store-Categories', [AdminController::class,'storeCategory'])->name('category.store');
    Route::get('edit-Categories/{id}', [AdminController::class,'editCategory'])->name('category.edit');
    Route::put('update-Categories/{id}', [AdminController::class,'updateCategory'])->name('category.update');
    Route::get('delete-Categories/{id}', [AdminController::class,'deleteCategory'])->name('category.delete');


    Route::get('posts/index', [AdminController::class,'AllPosts'])->name('admin_posts.index');
    Route::get('posts/delete/{id}', [AdminController::class,'deletePost'])->name('admin_posts.delete');


});

