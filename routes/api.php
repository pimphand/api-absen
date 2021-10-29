<?php

use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login',[AuthController::class, "store"])->name('api.login');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('v1/data/json_data/posrt',[AbsenController::class, "store"])->name('api.absen');
});

Route::post('v1/data/json_data',[ApiController::class, "api"]);

