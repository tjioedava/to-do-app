<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

Route::get('/', function (){
    return redirect()->route('index');
});

Route::controller(TaskController::class)->group(function (){
    Route::get('/home', 'index')->name('index');

    Route::post('/home', 'destroy')->name('destroy');

    Route::get('/task/add', 'add')->name('add');

    Route::post('/task/add', 'store')->name('store');

    Route::get('/task/{task}', 'show')->name('show');

    Route::get('/task/{task}/edit', 'edit')->name('edit');

    Route::patch('/task/{task}/edit', 'update')->name('update');
});

Route::controller(CategoryController::class)->group(function (){
    Route::get('/category/add', 'add')->name('add-category');

    Route::post('/category/add', 'store')->name('store-category');

    Route::get('/category/edit', 'edit')->name('edit-category');

    Route::patch('/category/edit', 'update')->name('update-category');

    Route::get('/category/delete', 'delete')->name('delete-category');

    Route::post('/category/delete', 'destroy')->name('destroy-category');
});