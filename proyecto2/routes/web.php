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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('areasconocimientos', 'livewire.areasconocimientos.index')->middleware('auth');
	Route::view('areasconocimientosopciones', 'livewire.areasconocimientosopciones.index')->middleware('auth');
	Route::view('materias', 'livewire.materias.index')->middleware('auth');
	Route::view('periodosacademicos', 'livewire.periodosacademicos.index')->middleware('auth');
	Route::view('cursos', 'livewire.cursos.index')->middleware('auth');
	Route::view('departamentos', 'livewire.departamentos.index')->middleware('auth');
	Route::view('campus', 'livewire.campus.index')->middleware('auth');
	Route::view('docente', 'livewire.docentes.index')->middleware('auth');
	Route::view('rolopciones', 'livewire.rolopciones.index')->middleware('auth');
	Route::view('courses', 'livewire.courses.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
