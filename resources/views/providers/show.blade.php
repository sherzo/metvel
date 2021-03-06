@extends('layouts.main')

@section('title', 'Proveedor')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('providers') }}">Proveedores</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">providero: {{ $provider->name }}</h4>
                    <p class="category"></p>
                    <a class="pull-right" href="{{ route('providers.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    <label for="">Rif</label>
                    <p>{{ $provider->dni }}</p>
                    <hr>


                    <label for="">Razón social</label>
                    <p>{{ $provider->name }}</p>
                    <hr>

                    <label for="">Teléfono</label>
                    <p> {{ $provider->phone }}</p>
                    <hr>

                    <label for="">Localización</label>
                    <p> {{ $provider->location }}</p>
                    <hr>

                    <label for="">Dirección fiscal</label>
                    <p> {{ $provider->address }}</p>
                    <hr>
                    <div class="form-group">
                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection