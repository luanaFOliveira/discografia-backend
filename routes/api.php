<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\TrackController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/albums', [AlbumController::class, 'store']);
Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/all-albums', [AlbumController::class, 'getAllAlbums']);
Route::get('/albums/{id}', [AlbumController::class, 'show']);
Route::put('/albums/{id}', [AlbumController::class, 'update']);
Route::delete('/albums/{id}', [AlbumController::class, 'destroy']);


Route::post('/tracks', [TrackController::class, 'store']);
Route::get('/tracks', [TrackController::class, 'index']);
Route::get('/tracks/{id}', [TrackController::class, 'show']);
Route::put('/tracks/{id}', [TrackController::class, 'update']);
Route::delete('/tracks/{id}', [TrackController::class, 'destroy']);
