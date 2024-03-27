<?php

namespace App\Http\Controllers;

use App\Models\ApiTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Codexshaper\WooCommerce\Facades\Order;
use Codexshaper\WooCommerce\Facades\Product;
use App\Models\OrdenesCompra;
use App\Models\Inventario;
use App\Models\InventarioHistorial;
use App\Models\WooProduct;

class ApiTestController extends Controller
{
    public function get_api()
    {
        $order_id = 4634;
        $order = json_decode(Order::find($order_id));
        // dd($order->line_items);
        // return $order;
        date_default_timezone_set("America/Mexico_City");
        // $inventario = Inventario::all();
        // $inventario =   ( $inventario );
        // $product = Product::update($product_id, $data);
        $inventario = Inventario::all(); // Get all inventory data

        foreach ($inventario as $inventarioItem) {
            $productId = $inventarioItem->woo_id; // Extract product ID
            $data = ['stock_quantity' => $inventarioItem->inventario]; // Prepare data update

            // Update the product with proper error handling
            Product::update($productId, $data);

        }

        return $inventario;
    }
    public function get_api2()
    {
        date_default_timezone_set("America/Mexico_City");


        $nota_de_remision = 72645;
        $order_id = 4634;
        $order = json_decode(Order::find($order_id));
        $productos = $order->line_items;
        $array = [];

        $num_pedido = []; //Número del Pedido
        $skus = []; //codigo de producto
        $cantidad = []; //Cantidad del Producto
        $precio_compra = []; //Precio del Producto 
        $descuento_linea = []; //Descuento por Línea del Producto 
        $detalle_impuesto = []; //En Detalle aplica Impuesto 1-IVA 
        $posicion = []; //Secuencial Posición
        $gratis = []; //Unidades Gratis
        $fecha_ingreso = []; //Fecha Ingreso Producto al Pedido 
        $aplica_impuesto = []; //En Detalle aplica Impuesto 2-IPES 
        $codigo_impuesto = []; //Código de Impuesto 2-IPES
        $precio_solicitado = []; //Precio Solicitado
        $descuento_solicitado = []; //Descuento Solicitado
        $adicionales_detalle = []; //Campos Adicionales del Detalle 
        $memo = []; //Memo Solicitud de Requisición
        $aplica_promocion = []; //Aplica Promoción
        $codigo_promocion = []; //Código Promoción 
        $cantidad_promocion = []; //Cantidad Original Promoción
        $incluye_impuesto = []; //El Precio incluye Impuesto
        $precio_alterno = []; //Código Precio Alterno 
        $tipo_precio = []; //Tipo de Precio
        $venta_original = []; //Precio de Venta Original
        $descuento_cliente = []; //Valor de Descuento del Cliente 
        $descuento_max = []; //Valor de Descuento Max. por línea 
        $descuento_grupo = []; //Valor de Descuento x Grupo
        $precio_final = []; //Precio Final con Descuento 

        foreach ($productos as $key => $producto) {
            if ($key == 0) {
                $num_pedido[] = $nota_de_remision;
            } else {
                $num_pedido[] = "|" . $nota_de_remision;
            }
            $contador = (intval($key)) + 1;


            $skus[] = "|" . $producto->sku; // codigo de producto
            $cantidad[] = "|" . $producto->quantity;
            $precio_compra[] = "|" . $producto->price;
            $descuento_linea[] = "|0";
            $detalle_impuesto[] = "|1";
            $posicion[] = "|" . $key + 1;
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
            $precio_alterno[] = "|5";
            $tipo_precio[] = "|5";
            $venta_original[] = "|" . $producto->price;
            $descuento_cliente[] = "|0";
            $descuento_max[] = "|0";
            $descuento_grupo[] = "|0";
            $precio_final[] = "|" . $producto->price;
            // dd($contador);
            // dd($num_pedido[$key]);

            $array[] = (


                $num_pedido[$key] . //Número del Pedido
                $skus[$key] . //codigo de producto
                $cantidad[$key] . //Cantidad del Producto
                $precio_compra[$key] . //Precio del Producto 
                $descuento_linea[$key] . //Descuento por Línea del Producto 
                $detalle_impuesto[$key] . //En Detalle aplica Impuesto 1-IVA 
                $posicion[$key] . //Secuencial Posición
                $gratis[$key] . //Unidades Gratis
                $fecha_ingreso[$key] . //Fecha Ingreso Producto al Pedido 
                $aplica_impuesto[$key] . //En Detalle aplica Impuesto 2-IPES 
                $codigo_impuesto[$key] . //Código de Impuesto 2-IPES
                $precio_solicitado[$key] . //Precio Solicitado
                $descuento_solicitado[$key] . //Descuento Solicitado
                $adicionales_detalle[$key] . //Campos Adicionales del Detalle 
                $memo[$key] . //Memo Solicitud de Requisición
                $aplica_promocion[$key] . //Aplica Promoción
                $codigo_promocion[$key] . //Código Promoción 
                $cantidad_promocion[$key] . //Cantidad Original Promoción
                $incluye_impuesto[$key] . //El Precio incluye Impuesto
                $precio_alterno[$key] . //Código Precio Alterno 
                $tipo_precio[$key] . //Tipo de Precio
                $venta_original[$key] . //Precio de Venta Original
                $descuento_cliente[$key] .  //Valor de Descuento del Cliente 
                $descuento_max[$key] . //Valor de Descuento Max. por línea 
                $descuento_grupo[$key] . //Valor de Descuento x Grupo
                $precio_final[$key] //Precio Final con Descuento 

            );
        }
        $str_detalle = implode($array);
        // dd($str_detalle);
        // $response = Http::get("http://138.255.60.182:8198/wsAPIS/api_read?ap_id=191443&ap_corp=E0001&ap_pass=2NBGig2x");
        // $response = Http::withUrlParameters([
        //     'endpoint' => 'http://138.255.60.182:8198/wsAPIS/api_wr?',
        //     'ap_corp' => 'E0001',
        //     'ap_pass' => '2NBGig2x',
        //     'CORP_s' => 'E0001',
        //     'INTEGER_1' => '1',
        //     'TEXTO1_10' => '2',
        //     'INTEGER_6' => "1",
        //     'NumDoc_s' => $nota_de_remision,
        //     'IDConsulta_s' => 'E0001-ECO-' . $nota_de_remision,
        //     'Local_origen' => 'ECO',
        //     'Local_destino' => 'ECO',
        //     'ORIGIN' => 'ECO',
        //     'Opcion_i' => 0,
        //     'CODE_s' => "01",
        //     'TEXTO2_X' => $nota_de_remision.'|ECO34058|'.date("d/m/Y").'|28/03/2024|PRI03|MN|PTC|E0001|||||0|||ECO|ENVIAR POR TRES GUERRAS AV. CENTRAL SUR NO.49 CENTRO HISTORICO COMITAN CHIAPAS ||',
        //     'TEXTO3_X' => $str_detalle,
        //     'GROUP_CATEGORY_s' => "'API'",
        // ])->get('{+endpoint}{&ap_corp}{&ap_pass}{&CORP_s}{&INTEGER_1}{&INTEGER_6}{&TEXTO1_10}{&NumDoc_s}{&IDConsulta_s}{&Local_origen}{&Local_destino}{&ORIGIN}{&Opcion_i}{&CODE_s}{&TEXTO2_X}{&TEXTO3_X}{&GROUP_CATEGORY_s}');
        // $response->body();
        // $api_id = json_decode($response->body());
        // $orden = new OrdenesCompra;
        // $orden->texto = $api_id->ap_res2;
        // $orden->json = json_encode($api_id);
        // $orden->save();
        // dd($response->body());
        return ($array);
    }
    public function by_id($id)
    {
        $product = Route::get('/get_api');
    }
}
