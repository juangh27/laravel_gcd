<?php

namespace App\Http\Controllers;

use App\Models\ApiTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Codexshaper\WooCommerce\Facades\Order;
use App\Models\OrdenesCompra;

class ApiTestController extends Controller
{
    public function index()
    {
        $tasks = ApiTest::all();
        return view('api_test.index');
    }

    public function create()
    {
        return view('api_test.layout');
    }
    public function creator()
    {
        return view('api_test.layout');
    }
    public function make()
    {
        return view('api_test.layout');
    }
    public function update(Request $request, ApiTest $task)
    {
        // Validation and task update logic
    }
    public function destroy(ApiTest $task)
    {
        $task->delete();
        return redirect()->route('api_test.index');
    }
    public function get_api()
    {
        $order_id = 4634;
        $order = json_decode(Order::find($order_id));
        // dd($order->line_items);
        // return $order;
        date_default_timezone_set("America/Mexico_City");
        return date("d/m/Y h:i:sa");
    }
    public function get_api2()
    {
        date_default_timezone_set("America/Mexico_City");

        $nota_de_remision = 72644;
        $order_id = 4634;
        $order = json_decode(Order::find($order_id));
        $productos = $order->line_items;
        $array = [];


        $num_pedido = [];
        $skus = []; //codigo de producto
        $cantidad = [];
        $precio_compra = [];
        $descuento_linea = [];
        $detalle_impuesto = [];
        $posicion = [];
        $gratis = [];
        $fecha_ingreso = [];
        $aplica_impuesto = [];
        $codigo_impuesto = [];
        $precio_solicitado = [];
        $descuento_solicitado = [];
        $adicionales_detalle = [];                      
        $descuento_detalle = [];
        $validacion_impuesto = [];
        $memo = [];
        $aplica_promocion = [];
        $codigo_promocion = [];
        $cantidad_promocion = [];
        $incluye_impuesto = [];
        $precio_alterno = [];
        $venta_original = [];
        $tipo_precio = [];
        $descuento_cliente = [];
        $descuento_max = [];
        $descuento_grupo = [];
        $precio_final = [];
        foreach ($productos as $key => $producto) {
            if ($key == 0) {
                $num_pedido[] = $nota_de_remision;
            } else {
                $num_pedido[] = "|" . $nota_de_remision;





            }












            $skus = "|" . $producto->sku; // codigo de producto
            $cantidad[] = "|" . $producto->quantity;
            $precio_compra[] = $producto->price;
            $descuento_linea[] = "|0";
            $detalle_impuesto[] = "|1";
            $posicion[] = $key++;
            $gratis[] = "|0";
            $fecha_ingreso[] = "|" . date("d/m/Y");
            $aplica_impuesto[] = "|0";
            $codigo_impuesto[] = "|0";
            $precio_solicitado[] = "|0";
            $descuento_solicitado[] = "|0";
            $adicionales_detalle[] = "|;;;00/00/00;00/00/00;00/00/00;0;0;0";
            $memo[] = "|";
            $aplica_promocion[] = "|0";
            $codigo_promocion[] = "|";
            $cantidad_promocion[] = "|0";
            $incluye_impuesto[] = "|0";
            $cajas[] = "|0";
            $descuento_detalle[] = "|0";

            $array[] = (







                $num_pedido[$key] .
                $skus[$key] . //codigo de producto
                $cantidad[$key] .
                $precio_compra[$key] .
                $descuento_linea[$key] .
                $detalle_impuesto[$key] .
                $posicion[$key] .
                $gratis[$key] .
                $fecha_ingreso[$key] .
                $aplica_impuesto[$key] .
                $codigo_impuesto[$key] .
                $precio_solicitado[$key] .
                $descuento_solicitado[$key] .
                $adicionales_detalle[$key] .
                $memo[$key] .
                $aplica_promocion[$key] .
                $codigo_promocion[$key] .
                $cantidad_promocion[$key] .
                $cajas[$key] .
                $descuento_detalle[$key]
            );
        }
        $str = implode($array);
        $response = Http::get("http://138.255.60.182:8198/wsAPIS/api_read?ap_id=191443&ap_corp=E0001&ap_pass=2NBGig2x");
        $response = Http::withUrlParameters([
            'endpoint' => 'http://138.255.60.182:8198/wsAPIS/api_wr?',
            'ap_corp' => 'E0001',
            'ap_pass' => '2NBGig2x',
            'CORP_s' => 'E0001',
            'INTEGER_1' => '1',
            'TEXTO1_10' => '2',
            'NumDoc_s' => $nota_de_remision,
            'IDConsulta_s' => 'E0001-ECO-' . $nota_de_remision,
            'Local_origen' => 'ECO',
            'Local_destino' => 'ECO',
            'ORIGIN' => 'ECO',
            'Opcion_i' => 0,
            'CODE_s' => 01,
            'TEXTO2_X' => '0039|0|00/00/00|00/00/00|US||0|0|MEMO UNO|MEMO DOS||||||00/00/00|||||',
            'TEXTO3_X' => $str,
            'GROUP_CATEGORY_s' => "'API'",
        ])->get('{+endpoint}{&ap_corp}{&ap_pass}{&CORP_s}{&INTEGER_1}{&TEXTO1_10}{&NumDoc_s}{&IDConsulta_s}{&Local_origen}{&Local_destino}{&ORIGIN}{&Opcion_i}{&CODE_s}{&TEXTO2_X}{&TEXTO3_X}{&GROUP_CATEGORY_s}');
        $response->body();
        $api_id = json_decode($response->body());
        $orden = new OrdenesCompra;
        $orden->texto = $api_id->ap_res2;
        $orden->save();
        return($response->body());
    }
    public function by_id($id)
    {
        $product = Route::get('/get_api');
    }
}
