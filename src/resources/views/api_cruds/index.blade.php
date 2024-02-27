@extends('api_cruds.layout')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('api_cruds.create') }}" class="btn btn-info">Create</a></div>
	<div class="d-flex justify-content-end mb-3"><a href="{{ route('api_cruds.create_api') }}" class="btn btn-info">Llamar api</a></div>

	<table id="tabla" class="display" style="width:100%">
		<thead>
			<tr>
				<th>SKU</th>
				<th>CORP</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Categoria</th>
				<th>Inventario</th>

				<th>Action</th>
			</tr>
		</thead>
		<!-- <tbody>
			@foreach($api_cruds as $api_crud)

				<tr>
					<td>{{ $api_crud->id }}</td>
					<td>{{ $api_crud->CORP }}</td>
					<td>{{ $api_crud->PRODUCT_NAME }}</td>
					<td>{{ $api_crud->DESCRIPTION }}</td>
					<td>{{ $api_crud->CATEGORY }}</td>
					<td>{{ $api_crud->AVAILABLE }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('api_cruds.show', [$api_crud->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('api_cruds.edit', [$api_crud->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['api_cruds.destroy', $api_crud->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach -->
		</tbody>
	</table>

@stop
