<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Registros;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;


class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Grafica de linea';

    protected function getData(): array
    {
        // $data = Trend::query(Registros::get()
        // ->groupBy('sku')->map->count()->sortDesc())
        // ->between(
        //     start: now()->startOfWeek(),
        //     end: now()->endOfWeek(),
        // )
        // ->perDay()
        // ->count();
 
        return [
            //
            // 'datasets' => [
            //     [
            //         'label' => 'Fechas',
            //         'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            //     ],
            // ],
            // 'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
