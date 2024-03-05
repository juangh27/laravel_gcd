<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Registros;
use App\Models\OrdenesCompra;
use Illuminate\Support\Arr;
use Spatie\WebhookClient\Models\WebhookCall;
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
        $event = Arr::get($this->webhookCall->payload, 'action');
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

        $orden->texto = $event;
        $orden->save();




    }
}
