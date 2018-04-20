@extends('layouts.main')

@section('title', 'Clientes')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('clients') }}">Clientes</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Editar cliente</h4>
                    <p class="category">Ingrese los datos que desea editar</p>
                    <a class="pull-right" href="{{ route('clients.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">

        			{{ Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT']) }}

                        @include('clients.partials.fields')

                        <div class="form-group">
                        	<button class="btn">Actualizar</button>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components.messages')
    <script src="{{ asset('js/src/locations.js') }}"></script>
@endsection