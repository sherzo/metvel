@extends('layouts.main')

@section('title', 'Proveedores')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('providers') }}">Proveedores</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Crear nuevo proveedor</h4>
                    <p class="category">Ingrese los datos para registrar un proveedor</p>
                    <a class="pull-right" href="{{ route('providers.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    {{ Form::open(['route' => 'providers.store']) }}

                        @include('providers.partials.fields')

                        <div class="form-group">
                            <button class="btn">Guardar</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components/messages')
    <script src="{{ asset('js/src/locations.js') }}"></script>
@endsection