<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourrierController;
use App\Http\Controllers\NotificationController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('courriers', CourrierController::class);
    Route::put('/courriers/{courrier}/status', [CourrierController::class, 'updateStatus']);
    Route::get('/courriers/search', [CourrierController::class, 'search']);
    Route::get('/notifications', [NotificationController::class, 'index']);
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
    Route::post('/courriers/{courrier}/archive', [CourrierController::class, 'archive']);
    Route::get('/courriers/{courrier}/download', [CourrierController::class, 'download']);
});
