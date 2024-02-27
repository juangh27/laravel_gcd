<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Automattic\WooCommerce\Client;
use App\Models\Registros;
use Codexshaper\WooCommerce\Facades\Product;

class CreateProducts extends CreateRecord
{
    protected static string $resource = ProductsResource::class;
    protected function beforeCreate(): void
    {
        $form = [];
        $form = ($this->form->getState());
        $data = [
            'name' => $form["PRODUCT_NAME"],
            'description' => $form["DESCRIPTION"],
            'stock_quantity' => (int)$form["AVAILABLE"],
            'sku' => $form["PRODUCT_ID"],
            // 'categories' => [
            //     'name' => $form->CATEGORY,
            // ],
        ];


        $product = Product::create($data);


        $register = new Registros;
        $register->user_id = auth()->user()->id; // Set user_id if applicable
        $register->inventario = (int)$form["AVAILABLE"];
        $register->sku = $form["PRODUCT_ID"];
        $register->operacion = "creacion";
        $register->save();
    }
}
