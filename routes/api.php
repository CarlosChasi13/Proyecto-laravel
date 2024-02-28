<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 */

Route::prefix('docentes')->group(function() {
    Route::apiResource('view', Controllers\DocenteController::class);
    Route::apiResource('info', Controllers\DocenteInfoController::class);
    Route::apiResource('area_conocimiento', Controllers\DocenteAreaConocimientoController::class);
});
Route::prefix('nrc')->group(function() {
    Route::apiResource('periodo', Controllers\NrcPeriodoController::class);
});
Route::prefix('materias')->group(function() {
    Route::apiResource('view', Controllers\MateriasController::class);
});
