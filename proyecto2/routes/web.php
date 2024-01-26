<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'getData']);

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
	Route::prefix('docencia')->group(function () {
		Route::view('docente', 'livewire.docentes.index');
		Route::view('titulo', 'livewire.titulos.index');
		Route::view('experiencialaboral', 'livewire.experiencialaborals.index');
		Route::view('capacitacion', 'livewire.capacitacions.index');
		Route::view('publicacioncientifica', 'livewire.publicacioncientificas.index');
		Route::view('areainteres', 'livewire.areainteres.index');
		
		Route::prefix('administracion')->group(function () {
			Route::view('rol', 'livewire.rols.index');
			Route::view('docenteareaconocimiento', 'livewire.docenteareaconocimientos.index');
		});
	});

	Route::prefix('academico')->group(function () {
		Route::view('nrc', 'livewire.nrcs.index');
		Route::view('asignatura', 'livewire.asignaturas.index');
	});
	
	Route::prefix('configuracion')->group(function () {
		Route::view('provincia', 'livewire.provinciaops.index');
		Route::view('pais', 'livewire.paisops.index');
		Route::view('genero', 'livewire.generos.index');
		
		Route::prefix('docencia')->group(function () {
			Route::view('codigoareaconocimiento', 'livewire.codigoareaconocimientos.index');
		});
		
		Route::prefix('academico')->group(function () {
			Route::view('grado', 'livewire.grados.index');
			Route::view('sigla', 'livewire.siglas.index');
			Route::view('periodoacademico', 'livewire.periodoacademicos.index');
			Route::view('sede', 'livewire.sedes.index');
			Route::view('areaconocimiento', 'livewire.areaconocimientos.index');
		});
	});

});
