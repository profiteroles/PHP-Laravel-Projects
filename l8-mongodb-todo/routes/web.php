<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TodolistController::class, 'index'])->name('index');
Route::resource('/lists', TodolistController::class);
Route::resource('/lists/{todolist:id}/tasks',TaskController::class);

Route::delete('/', [TodolistController::class, 'deleteAllList'])->name('deleteAllList');
Route::delete('/lists/{todolist:id}/tasks', [TaskController::class, 'deleteAll'])->name('deleteAll');
