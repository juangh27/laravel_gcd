<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Registros;

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
        //
        // $event = \Arr::get($this->webhookCall->payload, 'event');
        // $data = \Arr::get($this->webhookCall->payload, 'data', []);

        $register = new Registros;
        $register->user_id = 4; // Set user_id if applicable
        $register->inventario = 4;
        $register->sku = "test";
        $register->operacion = "testing";
        $register->save();
    }
}
