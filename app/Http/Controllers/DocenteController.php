<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docentes = Docente::all();
        if($docentes->isEmpty()){
            return response()->json(['message' => 'No hay datos disponibles.'], 200);
        }
        return $docentes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json(['error' => 'Prohibido. No tienes permiso para realizar esta acción.'], 403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $docente = Docente::find($id);
        if (!$docente) {
            return response()->json(['message' => 'No se encontró ningún docente con el ID especificado.'], 404);
        }
        return $docente;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['error' => 'Prohibido. No tienes permiso para realizar esta acción.'], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['error' => 'Prohibido. No tienes permiso para realizar esta acción.'], 403);
    }
}
