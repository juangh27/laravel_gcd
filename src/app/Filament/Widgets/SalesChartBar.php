<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;

use Filament\Widgets\ChartWidget;
use App\Models\Products;

class SalesChartBar extends ChartWidget
{
    protected static ?string $heading = 'Productos con mas stock';

    protected function getData(): array
    {
        $results = Products::orderByRaw('CAST(AVAILABLE as INTEGER)DESC')
            ->limit(7)
            ->get();
        $labels = $results->pluck('PRODUCT_NAME');
        $skus = $results->pluck('PRODUCT_ID');
        $values = $results->pluck('AVAILABLE');
        $arr_labels = $labels->toArray();
        $arr_skus = $skus->toArray();

        $combinedArray = array_map(function ($value1, $value2) {
            return [$value1, $value2];
        }, $arr_labels, $arr_skus);
        // dd($arr_skus);
        

        // dd($values->toArray());
        return [
            //
            'datasets' => [
                [   
                    'label' => 'dataset 1',
                    'data' => $values->toArray(),
                    'backgroundColor'=> [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                      ],
                      'borderColor'=> [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                      ],

                      'borderWidth'=> 1
                ],
            ],
            'labels' => $combinedArray,
            // 'labels' => $dataset,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
