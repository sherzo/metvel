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
                    <h4 class="title">Producto: {{ $product->name }}</h4>
                    <p class="category"></p>
                    <a class="pull-right" href="{{ route('products.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    <label for="">Nombre</label>
                    <p>{{ $product->name }}</p>
                    <hr>

                    <label for="">Descripción</label>
                    <p> {{ $product->description }}</p>
                    <hr>

                    <label for="">Precio</label>
                    <p><i class="ti-money"></i> {{ $product->price }}</p>
                    <hr>

                    <label for="">Stock actual</label>
                    <p>{{ $product->stock }}</p>
                    <hr>

                    <div class="form-group">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection