<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;


Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::post('/post',[PostController::class,'store'])->name('post.store');

});

Auth::routes();
