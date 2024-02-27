@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($api_crud, array('route' => array('api_cruds.update', $api_crud->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('titulo', 'Titulo', ['class'=>'form-label']) }}
			{{ Form::text('titulo', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('precio', 'Precio', ['class'=>'form-label']) }}
			{{ Form::text('precio', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('descripcion', 'Descripcion', ['class'=>'form-label']) }}
			{{ Form::textarea('descripcion', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('categoria', 'Categoria', ['class'=>'form-label']) }}
			{{ Form::textarea('categoria', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('imagen', 'Imagen', ['class'=>'form-label']) }}
			{{ Form::text('imagen', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
