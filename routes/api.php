<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ThesisController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});  

Route::get('/proposal', [ProposalController::class, 'index'])->middleware('auth:sanctum');
Route::get('/research', [ResearchController::class, 'index'])->middleware('auth:sanctum');
Route::get('/thesis', [ThesisController::class, 'index'])->middleware('auth:sanctum');


