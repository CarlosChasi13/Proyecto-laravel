<?php

namespace App\Filament\Widgets;

use App\Models\Docente;
use Filament\Widgets\ChartWidget;

class DocenteMateriaChart extends ChartWidget
{
    protected static ?string $heading = 'Top Docentes por Materias';
    protected static ?int $sort = 6;

    protected function getData(): array
    {
        // Obtener todos los docentes con sus respectivas relaciones de materias
        $docentes = Docente::withCount('materias')->orderByDesc('materias_count')->take(10)->get();

        // Preparar los datos para el gráfico de burbujas
        $data = [
            'datasets' => [
                [
                    'label' => 'Top Docentes por Materias',
                    'data' => $docentes->map(function ($docente) {
                        return [
                            'x' => rand(1, 100), // Se puede utilizar cualquier valor, ya que no hay una coordenada específica
                            'y' => $docente->materias_count, // La cantidad de materias del docente determina la posición vertical
                            'r' => $docente->materias_count * 5, // El tamaño de la burbuja se basa en la cantidad de materias (ajustar según sea necesario)
                        ];
                    })->toArray(),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
        ];

        return $data;
    }

    protected function getType(): string
    {
        return 'bubble';
    }
}
