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

//Route::resource('/', TodolistController::class);
Route::get('/', [TodolistController::class, 'index'])->name('index');
Route::get('/{todolist:id}', [TodolistController::class, 'show'])->name('show');
Route::post('/', [TodolistController::class, 'store'])->name('store');
Route::delete('/{todolist:id}', [TodolistController::class, 'destroy'])->name('destroy');
Route::delete('/{task:id}', [TodolistController::class, 'remove'])->name('remove');
Route::post('/{todolist:id}', [TaskController::class, 'store'])->name('addtask');
