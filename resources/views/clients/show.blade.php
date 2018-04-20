@extends('layouts.main')

@section('title', 'Cliente')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('clients') }}">Clientes</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">cliente: {{ $client->name }}</h4>
                    <p class="category"></p>
                    <a class="pull-right" href="{{ route('clients.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    <label for="">Rif</label>
                    <p>{{ $client->dni }}</p>
                    <hr>


                    <label for="">Razón social</label>
                    <p>{{ $client->name }}</p>
                    <hr>

                    <label for="">Teléfono</label>
                    <p> {{ $client->phone }}</p>
                    <hr>

                    <label for="">Localización</label>
                    <p> {{ $client->location }}</p>
                    <hr>

                    <label for="">Dirección fiscal</label>
                    <p> {{ $client->address }}</p>
                    <hr>
                    <div class="form-group">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection