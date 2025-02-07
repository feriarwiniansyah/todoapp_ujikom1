<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home');

Route::resource('lists', TaskListController::class);

Route::resource('tasks', TaskController::class); // mengambil semua function dari taskcontroller
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');