<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NrcPeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
