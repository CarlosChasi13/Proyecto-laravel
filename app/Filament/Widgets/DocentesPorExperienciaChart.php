<?php


namespace App\Filament\Widgets;

use App\Models\Experiencialaboral;
use Filament\Widgets\ChartWidget;

class DocentesPorExperienciaChart extends ChartWidget
{
    protected static ?string $heading = 'Docentes por Experiencia Laboral';
    protected static ?int $sort = 5;

    protected function getData(): array
    {
        // Obtener todos los datos de experiencia laboral
        $experiencias = Experiencialaboral::all();

        // Contar la cantidad de docentes por cada nivel de experiencia
        $experienciasCount = $experiencias->countBy('id_docente');

        // Preparar los datos para la gráfica de pie
        $labels = [];
        $data = [];
        foreach ($experienciasCount as $docenteId => $count) {
            $experiencia = Experiencialaboral::findOrFail($docenteId);
            $labels[] = $experiencia->docente->nombre . ' ' . $experiencia->docente->apellido;
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Docentes por Experiencia Laboral',
                    'data' => $data,
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                    ],
                    'borderColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)',
                    ],
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
