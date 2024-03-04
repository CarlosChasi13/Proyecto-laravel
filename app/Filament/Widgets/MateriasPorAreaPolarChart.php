<?php

namespace App\Filament\Widgets;

use App\Models\Materia;
use Filament\Widgets\ChartWidget;

class MateriasPorAreaPolarChart extends ChartWidget
{
    protected static ?string $heading = 'Número de Materias por Área de Conocimiento';
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Obtener todas las materias
        $materias = Materia::all();

        // Preparar datos para la gráfica
        $data = [
            'datasets' => [
                [
                    'label' => 'Número de Materias por Área de Conocimiento',
                    'backgroundColor' => ['#36A2EB', '#4BC0C0', '#FFCE56', '#FF6384'], // Colores para cada área
                    'borderColor' => '#ffffff',
                    'data' => $materias->pluck('horas_teoria')->toArray(), // Obtener directamente el valor de 'horas_total'
                ],
            ],
            'labels' => $materias->pluck('nombre')->toArray(),
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}