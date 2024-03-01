<?php

namespace App\Filament\Resources\WooProductResource\Pages;

use App\Filament\Resources\WooProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWooProduct extends CreateRecord
{
    protected static string $resource = WooProductResource::class;
}
