<?php

namespace App\Filament\Widgets;

use App\Models\Products;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProductTypeOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de productos', Products::query()->count()),
            Stat::make('Productos en E0001', Products::query()->where('CORP', 'E0001')->count()),
            Stat::make('Productos en E0002', Products::query()->where('CORP', 'E0002')->count()),
            //
        ];
    }
}
