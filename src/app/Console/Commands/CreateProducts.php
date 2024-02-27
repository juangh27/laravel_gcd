<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\New_products;
use Automattic\WooCommerce\Client;


class CreateProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $woocommerce = new Client(
            'http://localhost/wordpress/',
            'ck_7378ec2886d8885802908cd2ca59fddb25492a58',
            'cs_71560a7cae4685457f81c9d20af23f6710b0d021',
            [
                'version' => 'wc/v3',
            ]
        );

        $page = 1;
        $perPage = 100;
        $allProducts = [];

        do {
            // Fetch products for the current page
            $products = $woocommerce->get('products', ['order' => 'asc', 'per_page' => '99', 'page' => $page]);
            $allProducts = array_merge($allProducts, $products);
            $page++;
        } while ($page <= $perPage);
        dd($allProducts);


        // $endpoint = 'products/';
        // $products = New_products::distinct()->get();

        // $batchSize = 100;

        // $productChunks = $products->chunk($batchSize);

        // $woocommerce = new Client(
        //     'http://localhost/wordpress/',
        //     'ck_7378ec2886d8885802908cd2ca59fddb25492a58',
        //     'cs_71560a7cae4685457f81c9d20af23f6710b0d021',
        //     [
        //         'version' => 'wc/v3',
        //     ]
        // );
        // //   dd($tabla);
        // foreach ($productChunks as $productChunk) {
        //     $data = [];
        //     foreach ($productChunk as $product) {
        //         $data = [
        //             'name' => $product->PRODUCT_NAME,
        //             'description' => $product->DESCRIPTION,
        //             'sku' => $product->PRODUCT_ID,
        //             // 'stock_quantity' => $tablas->AVAILABLE,
        //             // 'stock_quantity'=> $tablas->AVAILABLE,

        //         ];

        //         //   dd($woocommerce);
        //         $woocommerce->post('products/batch', $data);
        //         //   dd($test);

        //     }
        // }
    }
}
