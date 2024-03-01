<?php

namespace App\Filament\Widgets;

use App\Models\Docente;
use Filament\Widgets\ChartWidget;

class DocentePorAreaChart extends ChartWidget
{
    protected static ?string $heading = 'Docentes por Área de Conocimiento ';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        // Obtener la cantidad de docentes por área de conocimiento
        $data = Docente::with('docenteareaconocimientos.codigoareaconocimiento.areaconocimiento')
            ->get()
            ->flatMap(function ($docente) {
                return $docente->docenteareaconocimientos->pluck('codigoareaconocimiento.areaconocimiento.nombre');
            })
            ->countBy()
            ->toArray();

        return [
            'labels' => array_keys($data),
            'datasets' => [
                [
                    'data' => array_values($data),
                    'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
