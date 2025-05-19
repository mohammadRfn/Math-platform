<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\GoogleAuthController;

Route::prefix('auth')->group(function () {
    Route::get('google/redirect', [GoogleAuthController::class, 'redirectToGoogle']);
    Route::get('google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
