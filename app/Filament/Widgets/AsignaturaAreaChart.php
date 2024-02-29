<?php

namespace App\Filament\Widgets;

use App\Models\Materia;
use Filament\Widgets\ChartWidget;

class AsignaturaAreaChart extends ChartWidget
{
    protected static ?string $heading = 'Materia por Área de Conocimiento';
    protected static ?int $sort = 3;


    public function getColumns(): array
    {
        return [
            'md' => 1,
            'xl' => 3,
        ];
    }

    protected function containerClass(): string
    {
        return 'materia-por-area-conocimiento-chart-container';
    }

    protected function titleClass(): string
    {
        return 'materia-por-area-conocimiento-chart-title';
    }

    protected function getData(): array
    {
        // Obtener todas las materias con sus respectivas relaciones
        $materias = Materia::with('areaConocimiento')->get();

        $data = [
            'datasets' => [
                [
                    'label' => 'Materia por Área de Conocimiento',
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => $materias->groupBy('areaConocimiento.nombre')->map->count()->values()->toArray(),
                ],
            ],
            'labels' => $materias->pluck('areaConocimiento.nombre')->unique()->values()->toArray(),
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
?>
