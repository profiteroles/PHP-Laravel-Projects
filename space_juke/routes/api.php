<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\GenreController;
use App\Http\Controllers\api\PlaylistController;
use App\Http\Controllers\api\TrackController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('auth-failed',[AuthController::class ,'authFailed'])->name('auth-fail');

Route::group(['middleware'=>['auth:sanctum']], function (){
    Route::resource('tracks', TrackController::class);
    Route::resource('playlists', PlaylistController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('users', UserController::class);
    Route::post('/logout', [AuthController::class, 'logout']);

});


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
