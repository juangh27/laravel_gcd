@extends('api_test.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Api testing</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('api_test.get_api') }}"> Prueba de api</a>
            </div>
        </div>
    </div>

      
@endsection