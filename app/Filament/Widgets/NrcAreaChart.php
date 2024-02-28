<?php

namespace App\Filament\Widgets;

use App\Models\Areaconocimiento;
use Filament\Widgets\ChartWidget;

class NrcAreaChart extends ChartWidget
{
    protected static ?string $heading = 'NRC por Área de Conocimiento';
    protected static ?int $sort = 1;

    protected function getData(): array
    {
        // Obtener todas las áreas de conocimiento
        $areasConocimiento = Areaconocimiento::all();

        // Inicializar el array de datos
        $data = [
            'datasets' => [
                [
                    'label' => 'NRC por Área de Conocimiento',
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                    'data' => [],
                ],
            ],
            'labels' => [],
        ];

        // Iterar sobre las áreas de conocimiento
        foreach ($areasConocimiento as $areaConocimiento) {
            // Contar la cantidad de NRCs relacionados con esta área de conocimiento
            $nrcCount = $areaConocimiento->nrcs()->count(); // <-- Utiliza la relación nrcs de área de conocimiento

            // Agregar el conteo al array de datos
            $data['datasets'][0]['data'][] = $nrcCount;

            // Agregar el nombre del área de conocimiento a las etiquetas
            $data['labels'][] = $areaConocimiento->nombre;
        }

        return $data;
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
