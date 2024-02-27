<?php

use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/edit/property', [PropertyController::class, 'index']);
Route::post('/edit/property', [PropertyController::class,'store']);


Route::get('/listmyproperty', [PropertyController::class,'index']);
Route::get('edit/property/{propertyId}', [PropertyController::class, 'update']);

Route::post('/verify-token', function () {
    return response()->json(['message' => 'Token válido'], 200);
});
