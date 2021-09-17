<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UploadedTaskController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/task",TaskController::class);

Route::apiResource('/uploadedTask',UploadedTaskController::class);

Route::get('/submittedTask', [UploadedTaskController::class ,'showTasks']);
Route::get('/leaderboard', [UploadedTaskController::class ,'leaderboard']);
Route::post('/approve', [UploadedTaskController::class ,'approve']);

