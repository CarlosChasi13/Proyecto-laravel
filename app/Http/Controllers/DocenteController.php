<?php
namespace App\Http\Controllers;

use App\Docente;

class DocenteController extends Controller
{
    public function obtenerDocentesConAreasConocimiento()
    {
        $docentes = Docente::with('areasConocimiento')->get();

        return view('docentes.index', compact('docentes'));
    }
}
