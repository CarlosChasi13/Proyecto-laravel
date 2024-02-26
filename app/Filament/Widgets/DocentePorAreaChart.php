<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Docente;

class DocentePorAreaChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        // Obtener todos los docentes con sus respectivas áreas de conocimiento
        $docentes = Docente::with('areasConocimiento')->get();

        // Contar cuántos docentes están asociados a cada área de conocimiento
        $data = $docentes->flatMap(function ($docente) {
            return $docente->areasConocimiento->pluck('nombre');
        })->countBy()->toArray();

        // Ordenar los datos por nombre de área de conocimiento
        ksort($data);

        // Crear etiquetas y valores para el gráfico
        $labels = array_keys($data);
        $values = array_values($data);

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Docentes por Área de Conocimiento',
                    'data' => $values,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Color de fondo de las áreas bajo la línea
                    'borderColor' => 'rgb(54, 162, 235)', // Color de la línea
                    'borderWidth' => 1, // Ancho del borde de la línea
                    'pointBackgroundColor' => 'rgb(54, 162, 235)', // Color de los puntos
                    'pointBorderColor' => '#fff', // Color del borde de los puntos
                    'pointBorderWidth' => 1, // Ancho del borde de los puntos
                    'pointRadius' => 4, // Radio de los puntos
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
