<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Asignatura;
use App\Models\Docente;
use App\Models\DocenteAreaConocimiento;


class DashboardController extends Controller
{

    public function mostrarDashboard()
    {
        // Obtener los datos para el gráfico de NRCs por materia
        $nrcsPorMateria = $this->nrcsPorMateria();
        $docenteporarea = $this ->docenteporarea();
        $asignaturasPorAreaConocimiento=$this->asignaturasPorAreaConocimiento();
        $topDocentesPorMaterias=$this->topDocentesPorMaterias();
        // Pasar los datos a la vista
        return view('dashboard', compact('nrcsPorMateria','docenteporarea','asignaturasPorAreaConocimiento','topDocentesPorMaterias'));
    }

    
    public function nrcsPorMateria()
    {
        // Obtener la cantidad de NRCs por materia
        $nrcsPorMateria = DB::table('nrc')
            ->join('asignatura', 'nrc.id_asignatura', '=', 'asignatura.id')
            ->select('asignatura.nombre', DB::raw('count(nrc.id) as total'))
            ->groupBy('asignatura.nombre')
            ->get();

        return $nrcsPorMateria;
    }


    public function docenteporarea()
    {
        // Obtener la cantidad de docentes por área de conocimiento
        $docenteporarea = DB::table('docenteareaconocimiento')
            ->join('codigoareaconocimiento', 'docenteareaconocimiento.id_codigoareaconocimiento', '=', 'codigoareaconocimiento.id')
            ->join('areaconocimiento', 'codigoareaconocimiento.id_areaconocimiento', '=', 'areaconocimiento.id')
            ->select('areaconocimiento.nombre', DB::raw('count(*) as total'))
            ->groupBy('areaconocimiento.nombre')
            ->get();
    
        return $docenteporarea;
    }
    

    public function asignaturasPorAreaConocimiento()
    {
          // Obtener los datos del controlador
   // Obtener los datos del controlador
    $asignaturasPorAreaConocimiento = DB::table('asignatura')
    ->join('codigoareaconocimiento', 'asignatura.id_codigoareaconocimiento', '=', 'codigoareaconocimiento.id')
    ->join('areaconocimiento', 'codigoareaconocimiento.id_areaconocimiento', '=', 'areaconocimiento.id')
    ->select('areaconocimiento.nombre', DB::raw('count(*) as total'))
    ->groupBy('areaconocimiento.nombre')
    ->get();


        return $asignaturasPorAreaConocimiento;
    }
    public function topDocentesPorMaterias()
    {
        // Obtener el top 5 de docentes que dan más materias
        $topDocentes = DB::table('docente')
            ->join('docenteareaconocimiento', 'docente.id', '=', 'docenteareaconocimiento.id_docente')
            ->join('asignatura', 'docenteareaconocimiento.id_codigoareaconocimiento', '=', 'asignatura.id_codigoareaconocimiento')
            ->select('docente.nombre', DB::raw('count(*) as total'))
            ->groupBy('docente.nombre')
            ->orderByDesc('total')
            ->take(5)
            ->get();
    
        return $topDocentes;
    }
    

    
    
    
}
