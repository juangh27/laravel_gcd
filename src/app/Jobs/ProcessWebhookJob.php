<?php

namespace App\Jobs;

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
        // $orden->json = "$dat";

        // $orden->texto = "test1";
        // $orden->save();


        // $data = $dat['payload'];
        //
        $register = new Registros;
        $register->user_id = 5; // Set user_id if applicable
        $register->sku = "test9";
        $register->inventario = 6;
        $register->operacion = "edicion";
        $register->save();
        // $event = \Arr::get($this->webhookCall->payload, 'event');


        // $orden->texto = "test2";
        // $orden->save();

        $orden->texto = $this->webhookCall;
        $orden->save();








    }
}
