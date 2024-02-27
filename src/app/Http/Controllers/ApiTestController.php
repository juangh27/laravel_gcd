<?php

namespace App\Http\Controllers;

use App\Models\ApiTest;
use App\Models\New_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use Symfony\Component\Mime\BodyRendererInterface;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Automattic\WooCommerce\Client;
use App\Models\Registros;
use Codexshaper\WooCommerce\Facades\Product;
use App\Models\Products;



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
        $response = Http::get('http://192.168.100.202:8198/wsAPIS/api_sel?ap_corp=E0001&ap_pass=2NBGig2x&ap_code=101');
        $body = json_encode($response);
        dd($response);


        // // foreach ($long as $value) {
        // //     dd($value);
        // // }
        // dd($body);
        // return $body[1];



        // // dd($response);
        // // dd($array);
        // // return $array[5];
        // // dd($array);
        // dd('Could not get users');


        // $process = new Process(['python', public_path('python.py')]);
        // $process->run();
        // dd($process->getOutput(), $process->getErrorOutput());
        // dd($process->getOutput());
        // return $process->getOutput();

        return $response;
    }
    public function get_api2()
    {
        $test = Registros::all();
        $products = Product::all();
        $i = 0;
        // return $sku;
        $mostCalledSkus = Registros::get()
            ->groupBy('sku')->map->count()->sortDesc();

        
        dd($mostCalledSkus);
        $sku = $mostCalledSkus->keys()->toArray();
        // ->count();
        // ->orderByDesc('calls')
        // ->limit(3)
        // ->pluck('sku')
        // ->toArray();
        // return $mostCalledSkus;
        foreach ($mostCalledSkus as $el) {
            if ($i >= 3) break;
            // $sku = $el;
            // echo $el;
            $i++;
        }

        dd($sku);
        return $sku;
        // $response = Http::get('localhost:8000/api/api_route');
        // dd($response);
        // $body = json_decode($response);

        // dd($body);
        // // dd($response[2]);
        // foreach ($body as $bodys) {
        //     $test[] = $bodys->id;

        //     // dd ($bodys) ;
        //     // return $responses;
        // }
        // dd($test);

        // $woocommerce = new Client(
        //     'http://localhost/wordpress/',
        //     'ck_7378ec2886d8885802908cd2ca59fddb25492a58',
        //     'cs_71560a7cae4685457f81c9d20af23f6710b0d021',
        //     [
        //         'version' => 'wc/v3',
        //     ]
        // );

        // $page = 1;
        // $perPage = 99;
        // $allProducts = [];
        // dd($woocommerce->get('products/8278'));

        // do {
        //     // Fetch products for the current page
        //     $products = $woocommerce->get('products', ['order' => 'asc', 'per_page' => $perPage, 'page' => $page]);
        //     $allProducts = array_merge($allProducts, $products);
        //     $page++;
        // } while ($page <= $perPage);
        // dd($allProducts);

        // ----------------
        // dd($woocommerce->get('products', ['order' => 'asc', 'per_page' => 99]));
        // $response = $woocommerce->get('products?order=asc');
        // dd($response);

        //   -----------------------------------------

        // $tabla= New_products::first();
        // dd($tabla);
        // $tabla = json_decode($tabla);

        //     dd($tabla->EMPRESA);

    }
    public function by_id($id)
    {
        $product = Route::get('/get_api');
    }
}
