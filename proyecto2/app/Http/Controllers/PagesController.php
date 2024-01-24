<?php

namespace App\Http\Controllers;

use App\Models\Campu;
use App\Models\Docente;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getDocentesData()
    {
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

        return view(
            'home.docentes', [
                'docentes' => $docentesData,
            ]);
    }

    public function getContactoInfo()
    {
        $campus = Campu::first();

        return  view(
            'home.contactanos', [
                'campus' => $campus
            ]);
    }
}
