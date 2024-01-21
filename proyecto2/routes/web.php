<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

//Route Hooks - Do not delete//
Route::view('nrc', 'livewire.nrcs.index')->middleware('auth');
Route::view('areasconocimientos', 'livewire.areadeconocimientos.index')->middleware('auth');
Route::view('areasconocimientosopciones', 'livewire.areasconocimientosopciones.index')->middleware('auth');
Route::view('materias', 'livewire.materias.index')->middleware('auth');
Route::view('periodosacademicos', 'livewire.periodosacademicos.index')->middleware('auth');
Route::view('cursos', 'livewire.cursos.index')->middleware('auth');
Route::view('departamentos', 'livewire.departamentos.index')->middleware('auth');
Route::view('campus', 'livewire.campus.index')->middleware('auth');
Route::view('docente', 'livewire.docentes.index')->middleware('auth');
Route::view('responsabilidad', 'livewire.responsabilidads.index')->middleware('auth');
Route::view('responsabilidadopciones', 'livewire.responsabilidadopciones.index')->middleware('auth');
Route::view('rol', 'livewire.rols.index')->middleware('auth');
Route::view('rolopciones', 'livewire.rolopciones.index')->middleware('auth');
Route::view('areainteres', 'livewire.areainteres.index')->middleware('auth');
Route::view('publicacioncientificas', 'livewire.publicacioncientificas.index')->middleware('auth');
Route::view('capacitacions', 'livewire.capacitacions.index')->middleware('auth');
Route::view('experiencialaborals', 'livewire.experiencialaborals.index')->middleware('auth');
Route::view('titulos', 'livewire.titulos.index')->middleware('auth');
