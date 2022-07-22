<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signin', [UserController::class,'signin']);
Route::post('/login', [UserController::class,'login']);

Route::group( ['middleware' => ['auth:sanctum']], function (){
    Route::get('{user}/profile',[UserController::class,'getProfile']);
    Route::put('{user}/profile/edit',[UserController::class,'updateProfile']);
    Route::get('/logout',[UserController::class,'logout']);
});
