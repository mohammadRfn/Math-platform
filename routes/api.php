<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\GoogleAuthController;
use App\Http\Controllers\ChallangeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    Route::get('google/redirect', [GoogleAuthController::class, 'redirectToGoogle']);
    Route::get('google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);

    Route::post('register', [AuthController::class, 'register']);

    Route::post('login', [AuthController::class, 'login']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::middleware('auth:api')->group(function () {

    Route::prefix('challenges')->group(function () {
        Route::get('/', [ChallangeController::class, 'index']);
        Route::post('/', [ChallangeController::class, 'store']);
        Route::put('/{id}', [ChallangeController::class, 'update']);
        Route::delete('/{id}', [ChallangeController::class, 'destroy']);
        Route::post('/{id}/participate', [ChallangeController::class, 'participate']);
    });

    Route::prefix('scores')->group(function () {
        Route::post('/{challangeId}', [ScoreController::class, 'store']);
    });

    Route::prefix('users')->group(function () {
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });
});
