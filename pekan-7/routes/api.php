<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
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
//method get
Route::get('/animals', [AnimalController::class, 'index'] );

//method post
Route::post('/animals',  [AnimalController::class, 'store'] );

//method put
Route::put('/animals/{id}',  [AnimalController::class, 'update'] );

//method delete
Route::delete('/animals/{id}',  [AnimalController::class, 'destroy'] );

# get all resource students
Route::get('/students' , [StudentController::class, 'index']);

Route::post('/students' , [StudentController::class, 'store']);

Route::put('/students/{id}' , [StudentController::class, 'update']);

Route::delete('/students/{id}' , [StudentController::class, 'destroy']);
//pekan 6
Route::get('/students/{id}', [StudentController::class, 'show']);
// memperbarui resource student
//method put
Route::put('/students/{id}', [StudentController::class, 'update']);
# menghapus resource student
# method delete
Route::delete('/students/{id}', [StudentController::class, 'delete']);
});
# membuat route untuk register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);