<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Registros;
use App\Models\OrdenesCompra;
use Codexshaper\WooCommerce\Facades\Order;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        $dat = json_decode($this->webhookCall, true);
        $data = $dat['payload'];
        //
        $register = new Registros;
        $register->user_id = 5; // Set user_id if applicable
        $register->inventario = $data->arg;
        $register->sku = "test5";
        $register->operacion = "edicion";
        $register->save();
        // $event = \Arr::get($this->webhookCall->payload, 'event');
        // $data = \Arr::get($this->webhookCall->payload, 'data', []);


        $orden = new OrdenesCompra;
        $orden->json = "$dat";

        $orden->texto = "fds";
        $orden->save();




    }
}
