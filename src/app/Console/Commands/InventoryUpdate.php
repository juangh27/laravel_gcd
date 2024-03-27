<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Inventario;
use Codexshaper\WooCommerce\Facades\Product;

class InventoryUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:inventory-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command updates the inventory according to the db on flask';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $inventario = Inventario::all(); // Get all inventory data
        foreach ($inventario as $inventarioItem) {
            $productId = $inventarioItem->woo_id; // Extract product ID
            $data = ['stock_quantity' => $inventarioItem->inventario]; // Prepare data update

            // Update the product with proper error handling
            Product::update($productId, $data);
        }
        $this->info('Se actualizo la base de datos.');

        //
    }
}
