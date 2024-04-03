<?php

namespace App\Http\Controllers;

use App\Models\ApiTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Codexshaper\WooCommerce\Facades\Order;
use Codexshaper\WooCommerce\Facades\Product;
use Codexshaper\WooCommerce\Facades\Customer;
use App\Models\OrdenesCompra;
use App\Models\Inventario;
use App\Models\InventarioHistorial;
use App\Models\WooProduct;

class ApiTestController extends Controller
{
    public function get_api()
    {
        $order_id = 4779;
        $order = json_decode(Order::find($order_id));
        dd($order);
        dd($order->line_items);
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



        $order_id = 4749;
        $order = json_decode(Order::find($order_id));
        // $nota_de_remision = 72645;
        // $order_id = 4634;
        // $order = json_decode(Order::find($order_id));
        // $productos = $order->line_items;
        // $array = [];

        // $num_pedido = []; //Número del Pedido
        // $skus = []; //codigo de producto
        // $cantidad = []; //Cantidad del Producto
        // $precio_compra = []; //Precio del Producto 
        // $descuento_linea = []; //Descuento por Línea del Producto 
        // $detalle_impuesto = []; //En Detalle aplica Impuesto 1-IVA 
        // $posicion = []; //Secuencial Posición
        // $gratis = []; //Unidades Gratis
        // $fecha_ingreso = []; //Fecha Ingreso Producto al Pedido 
        // $aplica_impuesto = []; //En Detalle aplica Impuesto 2-IPES 
        // $codigo_impuesto = []; //Código de Impuesto 2-IPES
        // $precio_solicitado = []; //Precio Solicitado
        // $descuento_solicitado = []; //Descuento Solicitado
        // $adicionales_detalle = []; //Campos Adicionales del Detalle 
        // $memo = []; //Memo Solicitud de Requisición
        // $aplica_promocion = []; //Aplica Promoción
        // $codigo_promocion = []; //Código Promoción 
        // $cantidad_promocion = []; //Cantidad Original Promoción
        // $incluye_impuesto = []; //El Precio incluye Impuesto
        // $precio_alterno = []; //Código Precio Alterno 
        // $tipo_precio = []; //Tipo de Precio
        // $venta_original = []; //Precio de Venta Original
        // $descuento_cliente = []; //Valor de Descuento del Cliente 
        // $descuento_max = []; //Valor de Descuento Max. por línea 
        // $descuento_grupo = []; //Valor de Descuento x Grupo
        // $precio_final = []; //Precio Final con Descuento 

        // foreach ($productos as $key => $producto) {
        //     if ($key == 0) {
        //         $num_pedido[] = $nota_de_remision;
        //     } else {
        //         $num_pedido[] = "|" . $nota_de_remision;
        //     }
        //     $contador = (intval($key)) + 1;


        //     $skus[] = "|" . $producto->sku; // codigo de producto
        //     $cantidad[] = "|" . $producto->quantity;
        //     $precio_compra[] = "|" . $producto->price;
        //     $descuento_linea[] = "|0";
        //     $detalle_impuesto[] = "|1";
        //     $posicion[] = "|" . $key + 1;
        //     $gratis[] = "|0";
        //     $fecha_ingreso[] = "|" . date("d/m/Y");
        //     $aplica_impuesto[] = "|0";
        //     $codigo_impuesto[] = "|0";
        //     $precio_solicitado[] = "|0";
        //     $descuento_solicitado[] = "|0";
        //     $adicionales_detalle[] = "|;;;00/00/00;00/00/00;00/00/00;0;0;0";
        //     $memo[] = "|";
        //     $aplica_promocion[] = "|0";
        //     $codigo_promocion[] = "|";
        //     $cantidad_promocion[] = "|0";
        //     $incluye_impuesto[] = "|0";
        //     $precio_alterno[] = "|5";
        //     $tipo_precio[] = "|5";
        //     $venta_original[] = "|" . $producto->price;
        //     $descuento_cliente[] = "|0";
        //     $descuento_max[] = "|0";
        //     $descuento_grupo[] = "|0";
        //     $precio_final[] = "|" . $producto->price;
        //     // dd($contador);
        //     // dd($num_pedido[$key]);

        //     $array[] = (


        //         $num_pedido[$key] . //Número del Pedido
        //         $skus[$key] . //codigo de producto
        //         $cantidad[$key] . //Cantidad del Producto
        //         $precio_compra[$key] . //Precio del Producto 
        //         $descuento_linea[$key] . //Descuento por Línea del Producto 
        //         $detalle_impuesto[$key] . //En Detalle aplica Impuesto 1-IVA 
        //         $posicion[$key] . //Secuencial Posición
        //         $gratis[$key] . //Unidades Gratis
        //         $fecha_ingreso[$key] . //Fecha Ingreso Producto al Pedido 
        //         $aplica_impuesto[$key] . //En Detalle aplica Impuesto 2-IPES 
        //         $codigo_impuesto[$key] . //Código de Impuesto 2-IPES
        //         $precio_solicitado[$key] . //Precio Solicitado
        //         $descuento_solicitado[$key] . //Descuento Solicitado
        //         $adicionales_detalle[$key] . //Campos Adicionales del Detalle 
        //         $memo[$key] . //Memo Solicitud de Requisición
        //         $aplica_promocion[$key] . //Aplica Promoción
        //         $codigo_promocion[$key] . //Código Promoción 
        //         $cantidad_promocion[$key] . //Cantidad Original Promoción
        //         $incluye_impuesto[$key] . //El Precio incluye Impuesto
        //         $precio_alterno[$key] . //Código Precio Alterno 
        //         $tipo_precio[$key] . //Tipo de Precio
        //         $venta_original[$key] . //Precio de Venta Original
        //         $descuento_cliente[$key] .  //Valor de Descuento del Cliente 
        //         $descuento_max[$key] . //Valor de Descuento Max. por línea 
        //         $descuento_grupo[$key] . //Valor de Descuento x Grupo
        //         $precio_final[$key] //Precio Final con Descuento 

        //     );
        // }
        // $str_detalle = implode($array);
        // // dd($str_detalle);
        // $response = Http::get("http://138.255.60.182:8198/wsAPIS/api_read?ap_id=191443&ap_corp=E0001&ap_pass=2NBGig2x");



        // Encabezado

        $encabezado_1 = 'WP'.$order_id;  //* Código Cliente
        $encabezado_2 = "JUAN GONZALEZ";  //*   Nombre Cliente 
        $encabezado_3 = "PELL780425PP7";  //*   Identificación 
        $encabezado_4 = "6141846579";   //Número Teléfono 1
        $encabezado_5 = "";   //Número Teléfono 2
        $encabezado_6 = "";   //Número de Fax
        $encabezado_7 = "AV.INDUSTRIAS";  //Dirección 1
        $encabezado_8 = "";   //Dirección 2
        $encabezado_9 = "";   //Dirección 3
        $encabezado_10 = "MX";  //Código País 
        $encabezado_11 = "CHI";  //Código Estado
        $encabezado_12 = "CHI19";  //Código Ciudad 
        $encabezado_13 = "";  //Código Sector 
        $encabezado_14 = "31136";  //Código Postal
        $encabezado_15 = "lulyperales@hotmail.com";  //E-Mail
        $encabezado_16 = "0";  //Límite Crédito 1 
        $encabezado_17 = "0";  //Límite Crédito 2
        $encabezado_18 = "0";  //Término de Pagos
        $encabezado_19 = "MN";  //Código Moneda
        $encabezado_20 = "MX1";  //Código Zona
        $encabezado_21 = "";  //Código Precio Negociado
        $encabezado_22 = "FSM";  //Código Tipo Cliente
        $encabezado_23 = "";  //Código Vendedor
        $encabezado_24 = "JUAN GONZALEZ";  //Responsable de la Cuenta 
        $encabezado_25 = "";  //Memo
        $encabezado_26 = "14/03/2022";  //Fecha Creación 
        $encabezado_27 = "L";  //*  Localización
        $encabezado_28 = "JUAN MIGUEL GONZALEZ HERNADEZ";  //Nombre Extenso
        $encabezado_29 = "PRI";  //Código Sucursal 
        $encabezado_30 = "";  //Código Cuenta Contable
        $encabezado_31 = "5";  //*  Lista de Precios
        $encabezado_32 = "1";  //*  Nivel de Riesgo
        $encabezado_33 = "";  //Código Transporte
        $encabezado_34 = "0;0;0;0;0;";  //Impuestos
        $encabezado_35 = "GPOLPV";  //Código de cliente relacionado 
        $encabezado_36 = "";  //Código Grupo de Descuentos 
        $encabezado_37 = "0";  //*  Fecha Acuse 
        $encabezado_38 = "0";  //*  Productos sin Negociación 
        $encabezado_39 = "0";  //*  Número Formato Impresión
        $encabezado_40 = "0";  //*  Precio convertido 1
        $encabezado_41 = "0";  //*  Precio Convertido 2 
        $encabezado_42 = "1";  //Nombre Extenso
        $encabezado_43 = "6";  //Número Exterior 
        $encabezado_44 = "2100";  //Número Interior
        $encabezado_45 = "CHH00361";  //Colonia 
        $encabezado_46 = "CHH00002";  //Localidad
        $encabezado_47 = "";  //Número Global Cliente
        $encabezado_48 = "";  //Código Secundario Cliente 
        $encabezado_49 = "CHH00019";  //Municipio 
        $encabezado_50 = "0";  //Moneda Única 
        $encabezado_51 = "";  //Identificación Fiscal 2 
        $encabezado_52 = "WM";  //Código de Categoría 
        $encabezado_53 = "FOR03";  //Código Giro del Negocio
        $encabezado_54 = "RCF";  //Código Régimen Fiscal
        $encabezado_55 = "1";  //Cobro contra Entrega
        $encabezado_56 = "";  //Código Grupo de Impuestos
        $encabezado_57 = "0";  //Cliente Inactivo 
        $encabezado_58 = "0";  //Cliente Control 
        $encabezado_59 = "0";  // Estatus No Venta 
        $encabezado_60 = "";  //Motivo
        $encabezado_61 = "0";  //Visualización de clientes
        $encabezado_62 = "";  //Tipo de Agrupación en Impresión
        $encabezado_63 = "";  //Código de Agrupación de Impresión 
        $encabezado_64 = "lulyperales@hotmail.com";  //Email Fiscal
        $encabezado_65 = "";  //Cuenta Contable Reserva 
        $encabezado_66 = "";  //Referencia / Ubigeo 

        // Datos fiscales

        $dato_1 = "";  //*   Tipo de Identificación Fiscal
        $dato_2 = "";  //Tipo de Régimen Fiscal 
        $dato_3 = "";  //Países Paraísos Fiscales  
        $dato_4 = "";   //Tipo de Ingresos del Exterior
        $dato_5 = "";   //*  Tipo de Identificación Cliente
        $dato_6 = "";   //Tipo de Pago
        $dato_7 = "";
        $dato_8 = "";
        $dato_9 = "";
        $dato_10 = "";
        $dato_11 = "";
        $dato_12 = "";
        $dato_13 = "";
        $dato_14 = "";
        $dato_15 = "";
        $dato_16 = "";
        $dato_17 = "";
        $dato_18 = "";
        $dato_19 = "";
        $dato_20 = "";
        $dato_21 = "";
        $dato_22 = "";
        $dato_23 = "";
        $dato_24 = "";
        $dato_25 = "";
        $dato_26 = "";
        $dato_27 = "";
        $dato_28 = "";
        $dato_29 = "";
        $dato_30 = "";
        $dato_31 = "";
        $dato_32 = "";
        $dato_33 = "";
        $dato_34 = "";  //*
        $dato_35 = "";
        $dato_36 = "";
        $dato_37 = "";
        $dato_38 = "";
        $dato_39 = "";
        $dato_40 = "";
        $dato_41 = "";
        $dato_42 = "";
        $dato_43 = "";
        $dato_44 = "";
        $dato_45 = "";
        $dato_46 = "";
        $dato_47 = "";
        $dato_48 = "";
        $dato_49 = "";
        $dato_50 = "";
        $dato_51 = "";
        $dato_52 = "";
        $dato_53 = "";
        $dato_54 = "";
        $dato_55 = "";
        $dato_56 = "";
        $dato_57 = "";
        $dato_58 = "";
        $dato_59 = "";
        $dato_60 = "";


        $response = Http::withUrlParameters([
            'endpoint' => 'http://138.255.60.182:8198/wsAPIS/api_wr?',
            'ap_corp' => 'E0001',
            'ap_pass' => '2NBGig2x',
            'CODE_s' => "05",
            'GROUP_CATEGORY_s' => "'API'",
            'CORP_s' => 'E0001',
            'INTEGER_1' => '1',
            'ORIGIN' => 'ECO',
            'TEXTO1_10' => '2',
            'TEXTO2_X' =>
                $encabezado_1 . '|' . $encabezado_2 . '|' . $encabezado_3 . '|' . $encabezado_4 . '|' . $encabezado_5 . '|' .
                $encabezado_6 . '|' . $encabezado_7 . '|' . $encabezado_8 . '|' . $encabezado_9 . '|' . $encabezado_10 . '|' .
                $encabezado_11 . '|' . $encabezado_12 . '|' . $encabezado_13 . '|' . $encabezado_14 . '|' . $encabezado_15 . '|' .
                $encabezado_16 . '|' . $encabezado_17 . '|' . $encabezado_18 . '|' . $encabezado_19 . '|' . $encabezado_20 . '|' .
                $encabezado_21 . '|' . $encabezado_22 . '|' . $encabezado_23 . '|' . $encabezado_24 . '|' . $encabezado_25 . '|' .
                $encabezado_26 . '|' . $encabezado_27 . '|' . $encabezado_28 . '|' . $encabezado_29 . '|' . $encabezado_30 . '|' .
                $encabezado_31 . '|' . $encabezado_32 . '|' . $encabezado_33 . '|' . $encabezado_34 . '|' . $encabezado_35 . '|' .
                $encabezado_36 . '|' . $encabezado_37 . '|' . $encabezado_38 . '|' . $encabezado_39 . '|' . $encabezado_40 . '|' .
                $encabezado_41 . '|' . $encabezado_42 . '|' . $encabezado_43 . '|' . $encabezado_44 . '|' . $encabezado_45 . '|' .
                $encabezado_46 . '|' . $encabezado_47 . '|' . $encabezado_48 . '|' . $encabezado_49 . '|' . $encabezado_50 . '|' .
                $encabezado_51 . '|' . $encabezado_52 . '|' . $encabezado_53 . '|' . $encabezado_54 . '|' . $encabezado_55 . '|' .
                $encabezado_56 . '|' . $encabezado_57 . '|' . $encabezado_58 . '|' . $encabezado_59 . '|' . $encabezado_60 . '|' .
                $encabezado_61 . '|' . $encabezado_62 . '|' . $encabezado_63 . '|' . $encabezado_64 . '|' . $encabezado_65 . '|',



            'TEXTO3_x' =>
                $dato_1 . '|' . $dato_2 . '|' . $dato_3 . '|' . $dato_4 . '|' . $dato_5 . '|' .
                $dato_6 . '|' . $dato_7 . '|' . $dato_8 . '|' . $dato_9 . '|' . $dato_10 . '|' .
                $dato_11 . '|' . $dato_12 . '|' . $dato_13 . '|' . $dato_14 . '|' . $dato_15 . '|' .
                $dato_16 . '|' . $dato_17 . '|' . $dato_18 . '|' . $dato_19 . '|' . $dato_20 . '|' .
                $dato_21 . '|' . $dato_22 . '|' . $dato_23 . '|' . $dato_24 . '|' . $dato_25 . '|' .
                $dato_26 . '|' . $dato_27 . '|' . $dato_28 . '|' . $dato_29 . '|' . $dato_30 . '|' .
                $dato_31 . '|' . $dato_32 . '|' . $dato_33 . '|' . $dato_34 . '|' . $dato_35 . '|' .
                $dato_36 . '|' . $dato_37 . '|' . $dato_38 . '|' . $dato_39 . '|' . $dato_40 . '|' .
                $dato_41 . '|' . $dato_42 . '|' . $dato_43 . '|' . $dato_44 . '|' . $dato_45 . '|' .
                $dato_46 . '|' . $dato_47 . '|' . $dato_48 . '|' . $dato_49 . '|' . $dato_50 . '|' .
                $dato_51 . '|' . $dato_52 . '|' . $dato_53 . '|' . $dato_54 . '|' . $dato_55 . '|' .
                $dato_56 . '|' . $dato_57 . '|' . $dato_58 . '|' . $dato_59 . '|' . $dato_60 ,


            // '|||||||||||||0|0|0|0|0|00/00/00|00/00/00|00/00/00|00/00/00|00/00/00|0|0|0|0|0|0|0||||||||||||0|0|0|0|0|00/00/00|00/00/00|00/00/00|00/00/00|00/00/00|0|0|0|||||||',
            'NumDoc_s' => $order_id,
            'Local_origen' => 'ECO',
            'Local_destino' => 'ECO',
            'IDConsulta_s' => 'E0001-ECO-' . $order_id,
            'Opcion_i' => 0,
        ])->get('{+endpoint}{&ap_corp}{&ap_pass}{&CODE_s}{&CORP_s}{&GROUP_CATEGORY_s}{&INTEGER_1}{&LONGINT_2}{&ORIGIN}{&TEXTO1_10}{&TEXTO2_X}{&TEXTO3_x}{&NumDoc_s}{&Local_origen}{&Local_destino}{&IDConsulta_s}{&Opcion_i}');
        $response->body();
        $api_id = json_decode($response->body());
        // $orden = new OrdenesCompra;
        // $orden->texto = $api_id->ap_res2;
        // $orden->json = json_encode($api_id);
        // $orden->save();
        dd($response->body());
        return ($api_id);
    }
    public function by_id($id)
    {
        $product = Route::get('/get_api');
    }
}
