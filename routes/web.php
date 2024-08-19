<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::post('/', [TaskController::class, 'destroy'])->name('destroy');

Route::get('/add-task', [TaskController::class, 'add'])->name('add');

Route::post('/add-task', [TaskController::class, 'store'])->name('store');

Route::get('/add-category', [TaskController::class, 'add_category'])->name('add-category');

Route::post('/add-category', [TaskController::class, 'store_category'])->name('store-category');

Route::get('/edit-category', [TaskController::class, 'edit_category'])->name('edit-category');

Route::patch('/update-category', [TaskController::class, 'update_category'])->name('update-category');

Route::get('/delete-category', [TaskController::class, 'delete_category'])->name('delete-category');

Route::post('/delete-category', [TaskController::class, 'destroy_category'])->name('destroy-category');

Route::get('/{task}', [TaskController::class, 'show'])->name('show');

Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');

Route::patch('/{task}/edit', [TaskController::class, 'update'])->name('update');