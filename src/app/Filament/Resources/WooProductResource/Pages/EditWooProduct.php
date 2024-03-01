<?php

namespace App\Filament\Resources\WooProductResource\Pages;

use App\Filament\Resources\WooProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWooProduct extends EditRecord
{
    protected static string $resource = WooProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
