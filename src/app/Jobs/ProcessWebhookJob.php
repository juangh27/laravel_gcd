<?php

namespace App\Jobs;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Registros;
use App\Models\OrdenesCompra;
use Codexshaper\WooCommerce\Facades\Order;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $orden = new OrdenesCompra;
        // // $orden->json = "$dat";

        $orden->texto = "test_20";
        $orden->save();


        // // $data = $dat['payload'];
        // //
        // $register = new Registros;
        // $register->user_id = 5; // Set user_id if applicable
        // $register->sku = "test9";
        // $register->inventario = 6;
        // $register->operacion = "edicion";
        // $register->save();
        // // $event = \Arr::get($this->webhookCall->payload, 'event');


        // // $orden->save();

        // $payload = $this->webhookCall->payload; // Get raw JSON payload
        // // $data = json_decode($payload, true); // Decode payload (optional)

        // // Access specific fields from $data if decoded
        // // $action = $data['action'];
        // // $arg = $data['arg'];
        // $orden->texto = "test2";
        // $orden->save();
        // $arg = $payload['arg'];
        // // $orden->texto = $arg;








    }
}
