<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Registros;
use App\Models\OrdenesCompra;
use Illuminate\Support\Arr;
use Codexshaper\WooCommerce\Facades\Order;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob implements ShouldQueue

{


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $order_id = Arr::get($this->webhookCall->payload, 'arg');
        // $data = Arr::get($this->webhookCall->payload, 'data', []);
        // $data_test= json_decode($this->webhookCall, true);
        // $data_testing = $data_test['payload'];
        // $dat = json_decode($this->webhookCall, true);
        // $data = $dat['payload'];


        $register = new Registros;
        $register->user_id = 5; // Set user_id if applicable
        $register->inventario = 6;
        $register->sku = "test5";
        $register->operacion = "edicion";
        $register->save();
        // $test= $this->webhookCall->payload;
        // $var = var_export($data_testing);




        $orden = new OrdenesCompra;
        // $orden->json = "$dat";

        $orden->texto = $order_id;
        $orden->json = Order::find($order_id);
        $orden->save();




    }
}
