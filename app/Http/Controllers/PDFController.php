<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Periodoacademico;
use App\Models\Nrc;
use App\Models\Materia;
use App\Models\Titulo;
use App\Models\AreaInteres;
use App\Models\Capacitacion;
use App\Models\Experiencialaboral;
use App\Models\Publicacioncientifica;
use App\Models\Docenteareaconocimiento;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generateDocentesPDF()
    {
        $docentes = Docente::get();
        $data = [
            'title' => 'Lista de docentes',
            'date' => date('m/d/Y'),
            // Total de equipos
            'totalDocentes' => count($docentes),
            // Docentes
            'docentes' => $docentes,
            
        ];
        $pdf = Pdf::loadView('docentesPdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('invoice.pdf');
    }

    public function generateNrcsPDF()
    {
        $nrcs = Nrc::get();
        $data = [
            'title' => 'Lista Nrc por Período',
            'date' => date('m/d/Y'),

            'totalNrcs' => count($nrcs),
        
            'nrcs' => $nrcs,
        ];
        $pdf = Pdf::loadView('nrcsPdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    public function generateMateriasPDF()
    {
        $materias = Materia::get();
        $data = [
            'title' => 'Lista Materias',
            'date' => date('m/d/Y'),

            'totalMaterias' => count($materias),
        
            'materias' => $materias,
        ];
        $pdf = Pdf::loadView('materiasPdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    public function generateAreasPDF()
    {
        $areas = Docenteareaconocimiento::get();
        $data = [
            'title' => 'Lista Docentes por Áreas',
            'date' => date('m/d/Y'),

            'totalareas' => count($areas),
        
            'areas' => $areas,
        ];
        $pdf = Pdf::loadView('areasPdf', $data);
        return $pdf->stream('invoice.pdf');
    }

    public function generateDatosPDF()
    {
        $titulos = Titulo::get();
        $capacitaciones= Capacitacion::get();
        $experiencias=Experiencialaboral::get();
        $areasinteres=Areainteres::get();
        $publicaciones=Publicacioncientifica::get();
        $data = [
            'title' => 'Lista Datos Docente',
            'date' => date('m/d/Y'),

            'totaltitulos' => count($titulos),
        
            'titulos' => $titulos,
            'capacitaciones'=>$capacitaciones,
            'experiencias'=>$experiencias,
            'areasinteres'=>$areasinteres,
            'publicaciones'=>$publicaciones,
        ];
        $pdf = Pdf::loadView('datosPdf', $data);
        return $pdf->stream('invoice.pdf');
    }
}
