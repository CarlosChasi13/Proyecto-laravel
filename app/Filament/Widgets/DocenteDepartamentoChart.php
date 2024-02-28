<?php

namespace App\Filament\Widgets;

use App\Models\Docente;
use Filament\Widgets\ChartWidget;

class DocenteDepartamentoChart extends ChartWidget
{
    protected static ?string $heading = 'Docentes por Departamento';
    protected static ?int $sort = 7;

    protected function getData(): array
    {
        // Obtener todos los docentes con sus respectivos departamentos
        $docentes = Docente::with('departamento')->get();

        // Contar la cantidad de docentes por departamento
        $data = $docentes->groupBy('departamento.nombre_dep')->map->count();

        // Preparar los datos para el gráfico
        $labels = $data->keys()->toArray();
        $values = $data->values()->toArray();

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Docentes por Departamento',
                    'data' => $values,
                    'backgroundColor' => [
                        '#36A2EB',
                        '#4BC0C0',
                        '#FFCE56',
                        '#FF6384',
                        // Agregar más colores si es necesario
                    ],
                    'borderColor' => '#ffffff',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}
