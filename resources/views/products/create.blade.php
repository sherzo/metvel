@extends('layouts.main')

@section('title', 'Productos')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('products') }}">Productos</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Crear nuevo producto</h4>
                    <p class="category">Ingrese los datos para registrar un producto</p>
                    <a class="pull-right" href="{{ route('products.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    {{ Form::open(['route' => 'products.store']) }}

                        @include('products.partials.fields')

                        <button class="btn">Guardar</button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection