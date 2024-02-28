<?php

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


Route::get('generate-docentes-pdf', [App\Http\Controllers\PDFController::class, 'generateDocentesPDF'])->name('generateDocentesPDF');

Route::get('generate-nrcs-pdf', [App\Http\Controllers\PDFController::class, 'generateNrcsPDF'])->name('generateNrcsPDF');

Route::get('generate-materias-pdf', [App\Http\Controllers\PDFController::class, 'generateMateriasPDF'])->name('generateMateriasPDF');

Route::get('generate-area-pdf', [App\Http\Controllers\PDFController::class, 'generateAreasPDF'])->name('generateAreasPDF');

Route::get('generate-datos-pdf', [App\Http\Controllers\PDFController::class, 'generateDatosPDF'])->name('generateDatosPDF');
