<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

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

Route::view('/', 'welcome');
Route::get('/docentes', [PagesController::class, 'getDocentesData']);
Route::get('/contactanos', [PagesController::class, 'getContactoInfo']);
Route::view('/materias', 'home.materias');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

//Route Hooks - Do not delete//
Route::prefix('admin')->middleware('auth')->group(function () {
	Route::view('docente', 'livewire.docentes.index');
	Route::view('generosopciones', 'livewire.generos.index');
    Route::view('nrc', 'livewire.nrcs.index');
    Route::view('areasconocimientos', 'livewire.areadeconocimientos.index');
    Route::view('areasconocimientosopciones', 'livewire.areasconocimientosopciones.index');
    Route::view('materias', 'livewire.materias.index');
    Route::view('periodosacademicos', 'livewire.periodosacademicos.index');
    Route::view('cursos', 'livewire.cursos.index');
    Route::view('departamentos', 'livewire.departamentos.index');
    Route::view('campus', 'livewire.campus.index');
    Route::view('responsabilidad', 'livewire.responsabilidads.index');
    Route::view('responsabilidadopciones', 'livewire.responsabilidadopciones.index');
    Route::view('rol', 'livewire.rols.index');
    Route::view('rolopciones', 'livewire.rolopciones.index');
    Route::view('areainteres', 'livewire.areainteres.index');
    Route::view('publicacioncientificas', 'livewire.publicacioncientificas.index');
    Route::view('capacitacions', 'livewire.capacitacions.index');
    Route::view('experiencialaborals', 'livewire.experiencialaborals.index');
    Route::view('titulos', 'livewire.titulos.index');
});
