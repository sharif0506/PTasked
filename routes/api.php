<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers as Controllers;

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

//Product Groups Routes endpoints. Example: http://127.0.0.1:8000/api/groups
Route::get('/groups', [Controllers\ProjectGroupController::class, 'index']);
Route::get('/groups/{id}', [Controllers\ProjectGroupController::class, 'show']);
Route::post('/groups', [Controllers\ProjectGroupController::class, 'store']);
Route::put('/groups/{id}', [Controllers\ProjectGroupController::class, 'update']);
Route::delete('/groups/{id}', [Controllers\ProjectGroupController::class, 'destroy']);

// Product Routes endpoints

// Issues or Tickets Routes endpoints

// Users

// Roles

// Product Backlog
