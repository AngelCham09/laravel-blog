<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::middleware('auth')->group(function () {

    //tags
    Route::get('/tags', [TagController::class, 'index'])->name(
        'tags.index'
    );
    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
    Route::post('/tags', [TagController::class, 'store'])->name(
        'tags.store'
    );
    Route::get('/tags/{tag}', [
        TagController::class,
        'edit'
    ])->name('tags.edit');
    Route::patch('/tags/{tag}', [TagController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tags.destroy');

    //category
    Route::get('/category', [CategoryController::class, 'index'])->name(
        'category.index'
    );
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name(
        'category.store'
    );
    Route::get('/category/{category}', [
        CategoryController::class,
        'edit'
    ])->name('category.edit');
    Route::patch('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    //post
    Route::get('/post', [PostController::class, 'index'])->name(
        'post.index'
    );
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name(
        'post.store'
    );
    Route::get('/post/{post}', [
        PostController::class,
        'edit'
    ])->name('post.edit');
    Route::patch('/post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
