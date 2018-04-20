@extends('layouts.main')

@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
@endsection

@section('subtitle')
	<a class="navbar-brand" href="{{ url('clients') }}">Clientes</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Crear nuevo cliente</h4>
                    <p class="category">Ingrese los datos para registrar un cliente</p>
                    <a class="pull-right" href="{{ route('clients.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    {{ Form::open(['route' => 'clients.store']) }}

                        @include('clients.partials.fields')

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

    <script src="{{ asset('js/chosen.jquery.min.js') }}"></script>
    <script>
        $(".chosen-select").chosen({no_results_text: "No se encontraron resultados con: "})
    </script>
@endsection