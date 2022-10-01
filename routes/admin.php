<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Post2Controller;
use App\Http\Controllers\Admin\Post3Controller;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use Illuminate\Support\Facades\Route;

Route::get('',[HomeController::class,'index'])->name('admin.dashboard');

Route::resource('categories', CategoryController::class)->names('admin.categories');

Route::resource('tags',TagController::class)->names('admin.tags');
//listar simple
Route::resource('posts',PostController::class)->names('admin.posts');
//listar con datatabes
Route::resource('posts2',Post2Controller::class)->names('admin.posts2');
//listar con jetstream
Route::resource('posts3',Post3Controller::class)->names('admin.posts3');

