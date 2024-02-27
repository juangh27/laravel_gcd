<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use App\Models\WcProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Automattic\WooCommerce\Client;
use Filament\Tables\Actions\EditAction;

use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{

    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('PRODUCT_NAME')
                    ->label("Nombre del producto")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('PRODUCT_ID')
                    ->label("SKU")
                    ->unique()
                    ->required()
                    ->hiddenOn('edit'),
                Forms\Components\TextInput::make('CORP')
                    ->label("Corporativo")
                    ->default('E0001')
                    ->disabled(),
                Forms\Components\TextInput::make('AVAILABLE')
                    ->label("Inventario")
                    ->numeric(),
                Forms\Components\TextInput::make('DESCRIPTION')
                    ->label("Descripcion del producto")
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('CATEGORY')
                    ->label("Seleccione una categoria")
                    ->required()
                    ->options([
                        'Sin categorizar' => 'Sin categorizar',
                        'ENVASADO' => 'Envasado',
                        'GRANEL' => 'Granel',
                        'UNISEX' => 'Unisex',
                        'MASCULINO' => 'Masculino',
                        'FEMENNO' => 'Femenino',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('PRODUCT_ID')
                    ->label('SKU')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('PRODUCT_NAME')
                    ->label('Nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('DESCRIPTION')
                    ->label('Descripcion')
                    ->sortable(),
                Tables\Columns\TextColumn::make('AVAILABLE')
                    ->label('Stock')
                    ->sortable(),
                Tables\Columns\TextColumn::make('CATEGORY')
                    ->label('Categoria')
                    ->searchable(),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->recordUrl(
                (null),
            )
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
