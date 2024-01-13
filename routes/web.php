<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;

//Роуты постов
Route::controller(PostController::class)->group(function(){
    Route::get('/', 'index')->name('posts');
    Route::get('/post/create', 'create')->name('post_create')->middleware('auth');
    Route::post('/post/store', 'store')->name('post_store')->middleware('auth');

    Route::middleware(['auth'])->group(function () {
        Route::get('/post/{id}/edit', 'edit')->name('post_edit');
        Route::post('/post/{id}/save', 'save')->name('post_save');
        Route::get('/post/{id}/delete', 'delete')->name('post_delete');
    });

    Route::get('/post/{id}', 'about')->name('post_about')->middleware('draft');
});


//Роуты категорий
Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'index')->name('categories');

    Route::middleware(['auth'])->group(function () {
        Route::get('/category/create', 'create')->name('category_create');
        Route::post('/category/store', 'store')->name('category_store');
        Route::get('/category/{id}/edit', 'edit')->name('category_edit');
        Route::post('/category/{id}/save', 'save')->name('category_save');
        Route::get('/category/{id}/delete', 'delete')->name('category_delete');
    });

    Route::get('/category/{id}', 'about')->name('category_about');
});

//Роуты логина, регистрации, логаута
Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'loginView')->name('login');
    Route::get('/registration', 'registrationView')->name('registration');
    Route::post('/login', 'login')->name('login_post');
    Route::post('/registration', 'registration')->name('registration_post');
    Route::get('/logout', 'logout')->name('logout');
});

//Роуты профиля
Route::middleware(['auth'])->group(function(){
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile_update', [ProfileController::class, 'profile_update'])->name('profile_update');
});

//Роут поиска по постам и категориям
Route::get('/search', [SearchController::class, 'index'])->name('search');
