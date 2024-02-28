<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();

        if($materias->isEmpty()){
            return response()->json(['message' => 'No hay datos disponibles.'], 200);
        }
        return $materias;
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
        $materia = Materia::find($id);
        if (!$materia) {
            return response()->json(['message' => 'No se encontró ningún docente con el ID especificado.'], 404);
        }
        return $materia;
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
