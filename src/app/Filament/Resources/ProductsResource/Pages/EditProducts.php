<?php

namespace App\Filament\Resources\ProductsResource\Pages;

use App\Filament\Resources\ProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Models\WcProduct;
use App\Models\Registros;
use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\Facades\Product;

class EditProducts extends EditRecord
{
    protected static string $resource = ProductsResource::class;

 
    protected function afterSave(): void
    {
        $form = $this->getRecord();
        // ...
        //  dd($SKU);
        $new_id = WcProduct::first('sku', $form->PRODUCT_ID)
            ->select('id')
            ->first();

        $data = [
            'name' => $form->PRODUCT_NAME,
            'description' => $form->DESCRIPTION,
            'stock_quantity' => (int)$form->AVAILABLE,
            // 'categories' => [
            //     'name' => $form->CATEGORY,
            // ],
        ];
        $product = Product::update($new_id->id, $data);
        // dd($product);
                    


        $register = new Registros;
        $register->user_id = auth()->user()->id; // Set user_id if applicable
        $register->inventario = $form->AVAILABLE;
        $register->sku = $form->PRODUCT_ID;
        $register->operacion = "edicion";
        $register->save();
    }

}
