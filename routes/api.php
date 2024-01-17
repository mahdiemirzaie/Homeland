<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\EstateController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/confirm', [AuthController::class, 'confirm'])->name('confirm');
Route::post('/set-password', [AuthController::class, 'setPassword'])->name('setPassword');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/forget-password', [AuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::apiResource('user', UserController::class)->parameter('user', 'user:uuid');
Route::apiResource('role', RoleController::class)->parameter('role', 'role:uuid');
Route::apiResource('category', CategoryController::class)->parameter('category', 'category:uuid');
Route::apiResource('city', CityController::class)->parameter('city', 'city:uuid');
Route::apiResource('estate', EstateController::class)->parameter('estate', 'estate:uuid');





















//$path = __DIR__ . '/api';
//$files = scandir($path, SCANDIR_SORT_NONE);
//$files = array_diff($files, ['.', '..']);
//foreach ($files as $file) {
//    require_once "api/{$file}";
//}
