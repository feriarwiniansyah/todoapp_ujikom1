<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskListController;
use Illuminate\Support\Facades\Route;

// Membuat route untuk home
Route::get('/', [TaskController::class, 'index'])->name('home'); //digunakan untuk route menampilkan index.blade
Route::get('/about', [TaskController::class, 'about'])->name('about'); //digunakan sebagai route untuk menampilkan about.blade

Route::resource('lists', TaskListController::class); //digunakan sebagai untuk megambil seluruh function di tasklistcontroller

Route::resource('tasks', TaskController::class); //digunakan sebagai untuk megambil seluruh function di taskcontroller
Route::patch('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete'); //digunakan sebagai route untuk mengupdate status task dari function complete di taskcontroller
Route::patch('/tasks/{task}/change-list', [TaskController::class, 'changeList'])->name('tasks.changeList'); //digunakan sebagai route untuk mengupdate list task dari function changeList di taskcontroller