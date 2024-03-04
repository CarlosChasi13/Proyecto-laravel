<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Sede;

class PageController extends Controller
{
    public function getData()
    {
        $campus = Sede::first();
        
        $docente = Docente::all();

        $docentesData = $docente->map(function ($docente) {
            $titulo =$docente->titulos()->first();
            $capacitaciones =$docente->capacitaciones;

            return [
                'docente' => $docente,
                'titulo' => $titulo,
                'capacitaciones' => $capacitaciones,
            ];
        }); 

        return  view(
            'welcome', [
                'campus' => $campus,
                'docentes' => $docentesData,
            ]);
    }
}