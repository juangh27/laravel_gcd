<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Api_route;
use App\Http\Requests\Api_routeRequest;
use App\Http\Resources\Api_routeResource;
use App\Models\Api_crud;


class Api_routesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $api_routes = Api_crud::paginate(15);
        return Api_routeResource::collection($api_routes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Api_routeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Api_routeRequest $request)
    {
        $api_route = new Api_route;
		$api_route->titulo = $request->input('titulo');
		$api_route->precio = $request->input('precio');
		$api_route->descripcion = $request->input('descripcion');
		$api_route->categoria = $request->input('categoria');
		$api_route->imagen = $request->input('imagen');
        $api_route->save();

        return response()->json($api_route, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $api_route = Api_crud::findOrFail($id);
        return new Api_routeResource($api_route);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Api_routeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Api_routeRequest $request, $id)
    {
        $api_route = Api_route::findOrFail($id);
		$api_route->titulo = $request->input('titulo');
		$api_route->precio = $request->input('precio');
		$api_route->descripcion = $request->input('descripcion');
		$api_route->categoria = $request->input('categoria');
		$api_route->imagen = $request->input('imagen');
        $api_route->save();

        return response()->json($api_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $api_route = Api_route::findOrFail($id);
        $api_route->delete();

        return response()->json(null, 204);
    }
}
