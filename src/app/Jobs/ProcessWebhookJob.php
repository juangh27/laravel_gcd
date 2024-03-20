<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Registros;
use App\Models\OrdenesCompra;
use Illuminate\Support\Arr;
use Codexshaper\WooCommerce\Facades\Order;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use Illuminate\Support\Facades\Http;


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

        // $orden = new OrdenesCompra;
        // // $orden->json = "$dat";

        // $orden->texto = $order_id;
        // $orden->json = Order::find($order_id);
        // $orden->save();


        $response = Http::get("http://138.255.60.182:8198/wsAPIS/api_read?ap_id=191443&ap_corp=E0001&ap_pass=2NBGig2x");
        $response = Http::withUrlParameters([
            'endpoint' => 'http://138.255.60.182:8198/wsAPIS/api_wr?',
            'ap_corp' => 'E0001',
            'ap_pass' => '2NBGig2x',
            'CORP_s' => 'E0001',
            'INTEGER_1' => '1',
            'TEXTO1_10' => '2',
            'NumDoc_s' => 250244,
            'IDConsulta_s' => 'AMERI250244',
            'Local_origen' => 'PRI',
            'Local_destino' => 'PRI',
            'ORIGIN' => 'PRI',
            'Opcion_i' => 0,
            'CODE_s' => 18,
            'TEXTO2_X' => '0039|0|00/00/00|00/00/00|US||0|0|MEMO UNO|MEMO DOS||||||00/00/00|||||',
            'TEXTO3_X' => 'F1337|1|20000|0|0|0.554||;;;;PRI;;;;|M1216|1|20000|0|0|0.554||;;;;PRI;;;;|M1218|1|20000|0|0|0.554||;;;;PRI;;;;|1217|1|40000|0|0|0.554||;;;;PRI;;;;',
            'GROUP_CATEGORY_s' => "'API'",
        ])->get('{+endpoint}{&ap_corp}{&ap_pass}{&CORP_s}{&INTEGER_1}{&TEXTO1_10}{&NumDoc_s}{&IDConsulta_s}{&Local_origen}{&Local_destino}{&ORIGIN}{&Opcion_i}{&CODE_s}{&TEXTO2_X}{&TEXTO3_X}{&GROUP_CATEGORY_s}');
        $response->body();
        $api_id = json_decode($response->body());
        $orden = new OrdenesCompra;
        $orden->texto = $api_id->ap_res2;
        $orden->save();
        
        // $orden = new OrdenesCompra;
        // // $orden->json = "$dat";

        // $orden->texto = $test;
        // // $orden->json = Order::find($order_id);
        // $orden->save();


    }
}
