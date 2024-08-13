<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('index');

Route::post('/', [TaskController::class, 'destroy'])->name('destroy');

Route::get('/add-task', [TaskController::class, 'add'])->name('add');

Route::post('/add-task', [TaskController::class, 'store'])->name('store');

Route::get('/{task}', [TaskController::class, 'show'])->name('show');

Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');

Route::patch('/{task}/edit', [TaskController::class, 'update'])->name('update');
