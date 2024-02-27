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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('properties', [PropertyController::class, 'index']);
// Route::post('properties', [PropertyController::class, 'store']);
// Route::get('properties/{id}', [PropertyController::class, 'show']);
// Route::put('properties/{id}', [PropertyController::class, 'update']);
// Route::delete('properties/{id}', [PropertyController::class, 'destroy']);

// /listmyproperty
Route::get('edit/property', [PropertyController::class, 'index']);
Route::post('edit/property', [PropertyController::class,'store']);

// /listmyproperty
Route::get('listmyproperty', [PropertyController::class,'index']);
// property/${propertyId}
Route::get('edit/property/{propertyId}', [PropertyController::class, 'update']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/verify-token', function () {
    return response()->json(['message' => 'Token válido'], 200);
});

