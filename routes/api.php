<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InfopixelController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\UserAuthController;
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


Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::get('/collection/{id}',[CollectionController::class,'show']);
Route::get('/c_i/{id}',[InfopixelController::class,'pivot']);

Route::get('/infopixels/{id}',[InfopixelController::class,'show']);

// Authenticated Users :
Route::group(['middleware'=>['auth:sanctum']], function(){
    Route::get('/collection',[CollectionController::class,'index']);
    //Route::get('/collection/{id}',[CollectionController::class,'show']);
});
  

