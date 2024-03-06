<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WooProductResource\Pages;
use App\Filament\Resources\WooProductResource\RelationManagers;
use App\Models\WooProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WooProductResource extends Resource
{
    protected static ?string $model = WooProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('tipo')
                    ->label("Tipo de producto"),
                Forms\Components\TextInput::make('sku')
                    ->label("SKU")
                    ->unique()
                    ->required()
                    ->hiddenOn('edit'),
                Forms\Components\TextInput::make('id')
                    ->label("Id woocomerce")
                    ->disabled(),
                Forms\Components\TextInput::make('stock')
                    ->label("Inventario")
                    ->numeric(),
                Forms\Components\TextInput::make('descripcion_corta')
                    ->label("Descripcion del producto")
                    ->maxLength(512),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo de producto'),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU'),
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stock')
                    ->label('Inventario')
                    ->sortable(),
                Tables\Columns\TextColumn::make('ventas_dirigidas')
                    ->label('Ventas dirigidas'),
                Tables\Columns\TextColumn::make('ventas_cruzadas')
                    ->label('Ventas cruzadas'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListWooProducts::route('/'),
            'create' => Pages\CreateWooProduct::route('/create'),
            'edit' => Pages\EditWooProduct::route('/{record}/edit'),
        ];
    }
}
