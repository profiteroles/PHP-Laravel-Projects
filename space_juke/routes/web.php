<?php

use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlaylistController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TrackController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    if(auth()->user()){
        auth()->user()->assignRole('admin');
    }
    return view('welcome');
})->name('home');


Route::prefix('admin')->group(function (){
    Route::resource('users',UserController::class);
    Route::resource('genres',GenreController::class);
    Route::resource('tracks',TrackController::class);
    Route::resource('playlists',PlaylistController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
});

Route::get('/admin/playlists/{playlist:id}/removeTrack/{track}', [PlaylistController::class, 'removeTrack'])->name('playlist.removeTrack');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
