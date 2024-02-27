<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Api_crud;
use App\Http\Requests\Api_crudRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use App\Models\New_products;
use Automattic\WooCommerce\Client;

class Api_crudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // $api_cruds= Api_crud::all();
        $api_cruds= New_products::all()->take(10);


        return view('api_cruds.index', ['api_cruds'=>$api_cruds]);
    }
    public function index2()
    {
        $api_cruds= Api_crud::all();
        return ($api_cruds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('api_cruds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Api_crudRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Api_crudRequest $request)
    {
        $api_crud = new Api_crud;
		$api_crud->titulo = $request->input('titulo');
		$api_crud->precio = $request->input('precio');
		$api_crud->descripcion = $request->input('descripcion');
		$api_crud->categoria = $request->input('categoria');
		$api_crud->imagen = $request->input('imagen');
        $api_crud->save();

        return to_route('api_cruds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $api_crud = Api_crud::findOrFail($id);
        return view('api_cruds.show',['api_crud'=>$api_crud]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $api_crud = Api_crud::findOrFail($id);
        return view('api_cruds.edit',['api_crud'=>$api_crud]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Api_crudRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Api_crudRequest $request, $id)
    {
        $api_crud = Api_crud::findOrFail($id);
		$api_crud->titulo = $request->input('titulo');
		$api_crud->precio = $request->input('precio');
		$api_crud->descripcion = $request->input('descripcion');
		$api_crud->categoria = $request->input('categoria');
		$api_crud->imagen = $request->input('imagen');
        $api_crud->save();

        return to_route('api_cruds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $api_crud = Api_crud::findOrFail($id);
        $api_crud->delete();

        return to_route('api_cruds.index');
    }
    public function create_api()
    {
        // $response = Http::get('https://fakestoreapi.com/products/1');


        // $response = json_decode(Http::get('https://fakestoreapi.com/products/1'));
        // $response = json_decode(Http::get('https://fakestoreapi.com/products/1'));
        
        // $api_crud = new Api_crud;
		// $api_crud->titulo = $response->title;
		// $api_crud->precio = $response->price;
		// $api_crud->descripcion = $response->description;
		// $api_crud->categoria = $response->category;
		// $api_crud->imagen = $response->rating->count;
        // $api_crud->save();
        // $id = $response->title;

        $endpoint = 'products/';
        $tabla= New_products::all()->take(10);
        dd($tabla);

        $woocommerce = new Client(
            'http://localhost/wordpress/',
            'ck_7378ec2886d8885802908cd2ca59fddb25492a58',
            'cs_71560a7cae4685457f81c9d20af23f6710b0d021',
            [
              'version' => 'wc/v3',
            ]
          );
          foreach ($tabla as $tablas) {
            $data = [
                'name' => $tablas->PRODUCT_NAME,
                'description' =>$tablas->DESCRIPTION,
                'sku' => $tablas->PRODUCT_ID,
                // 'stock_quantity'=> $tablas->AVAILABLE,
    
            ];
              
              //   dd($woocommerce);
              $productos= $woocommerce->post('products',$data);
              //   dd($test);
              
            }


        return to_route('api_cruds.index');
    }
    public function getDatatableData(){
        $data= New_products::all();
        return response()->json(['data' => $data]);

    }
}
