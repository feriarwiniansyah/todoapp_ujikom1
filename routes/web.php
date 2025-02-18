<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home'); //digunakan untuk route menampilkan index.blade
Route::get('/about', [TaskController::class, 'about'])->name('about'); //digunakan sebagai route untuk menampilkan about.blade

Route::resource('lists', TaskListController::class); 

Route::resource('tasks', TaskController::class);
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete'); //digunakan sebagai route untuk menampilkan complete.blade
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList');