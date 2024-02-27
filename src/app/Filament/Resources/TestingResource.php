<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestingResource\Pages;
use App\Filament\Resources\TestingResource\RelationManagers;
use App\Models\Registros;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;

class TestingResource extends Resource
{
    protected static ?string $model = Registros::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sku')
                    ->label('SKU'),
                TextColumn::make('operacion')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'edicion' => 'warning',
                        'creacion' => 'success',
                    })
                    ->label('Operacion'),
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Usuario'),
                TextColumn::make('inventario')
                    ->label('Stock'),
                TextColumn::make('created_at')
                    ->label('Fecha de modificacion')
                    ->date(),
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->since()
                    ->searchable()
                    ->sortable()
                    ->date(),
                //
            ])
            ->filters([
                //
            ]);
        // ->actions([
        //     Tables\Actions\EditAction::make(),
        // ]);

    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestings::route('/'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
}
