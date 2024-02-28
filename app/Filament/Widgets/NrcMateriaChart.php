<?php

namespace App\Filament\Widgets;

use App\Models\Nrc;
use Filament\Widgets\ChartWidget;

class NrcMateriaChart extends ChartWidget
{
    protected static ?string $heading = 'NRC por Materia';
    protected static ?int $sort = 5;

    protected function getData(): array
    {
        // Obtener todos los NRCs con sus respectivas relaciones de materia
        $nrcs = Nrc::with('materia')->get();

        // Agrupar por materia y contar la cantidad de NRCs asociados
        $data = [
            'datasets' => [
                [
                    'label' => 'NRC por Materia',
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => $nrcs->groupBy('materia.nombre')->map->count()->values()->toArray(),
                ],
            ],
            'labels' => $nrcs->pluck('materia.nombre')->unique()->values()->toArray(),
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
