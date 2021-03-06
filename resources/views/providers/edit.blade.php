@extends('layouts.main')

@section('title', 'Proveedores')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('providers') }}">provideros</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Editar proveedor</h4>
                    <p class="category">Ingrese los datos que desea editar</p>
                    <a class="pull-right" href="{{ route('providers.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">

        			{{ Form::model($provider, ['route' => ['providers.update', $provider->id], 'method' => 'PUT']) }}

                        @include('providers.partials.fields')

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