<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::post('edit/property', [PropertyController::class,'store']);

    Route::put('edit/property/{propertyId}', [PropertyController::class, 'update']);
});
Route::get('listmyproperty', [PropertyController::class,'index']);
Route::post('/verify-token', function () {
    return response()->json(['message' => 'Token válido'], 200);
});
// logout
Route::post('logout', [AuthController::class, 'logout']);

