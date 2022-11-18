<?php

use App\Http\Controllers\CovidController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/pasiens', [CovidController::class, 'index']);
Route::post('/pasiens',[CovidController::class, 'store']);
Route::get('/pasiens/{id}', [CovidController::class, 'show']);
Route::put('/pasiens/{id}', [CovidController::class,'update']);
Route::delete('pasiens/{id}',[CovidController::class, 'destroy']);
Route::get('/pasiens/search/{name}', [CovidController::class, 'search']);
Route::get('/pasiens/status/positive', [CovidController::class, 'positive']);
Route::get('/pasiens/status/recovered', [CovidController::class, 'recovered']);
Route::get('/pasiens/status/dead', [CovidController::class, 'dead']);
});
# Register dan Login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
