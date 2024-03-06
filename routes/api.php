<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::middleware(['isAdmin', 'jwt.auth'])->group(function () {
});

Route::middleware(['isUser', 'jwt.auth'])->group(function () {
    Route::get('problems/{id}', [ProblemController::class, 'show']);
    Route::post('problems', [ProblemController::class, 'store']);
    Route::delete('problems/{id}', [ProblemController::class, 'destroy']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    Route::get('roles', [RoleController::class, 'index']);
    Route::get('roles/{id}', [RoleController::class, 'show']);
});

Route::post('users', [UserController::class, 'store']);
Route::get('problems', [ProblemController::class, 'index']);

Route::get('statuses', [StatusController::class, 'index']);
Route::get('statuses/{id}', [StatusController::class, 'show']);