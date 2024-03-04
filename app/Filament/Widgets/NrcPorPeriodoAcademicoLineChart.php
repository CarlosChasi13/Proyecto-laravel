<?php

namespace App\Filament\Widgets;

use App\Models\Periodoacademico;
use Filament\Widgets\ChartWidget;

class NrcPorPeriodoAcademicoLineChart extends ChartWidget
{
    protected static ?string $heading = 'NRCs por Periodo Académico';
    protected static ?int $sort = 3;

  
    protected function getData(): array
    {
        // Obtener todos los periodos académicos con sus respectivos NRCs
        $periodos = Periodoacademico::withCount('nrcs')->get();

        // Preparar los datos para la gráfica de líneas
        $labels = $periodos->pluck('periodo_completo'); // Usamos el atributo calculado 'periodo_completo' definido en el modelo
        $data = $periodos->pluck('nrcs_count');

        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'número de NRCs ',
                    'data' => $data,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    
}
