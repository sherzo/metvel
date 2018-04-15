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
                    <h4 class="title">Listado</h4>
                    <p class="category">Productos con sus categorías</p>
                    <a href="{{ path('product_new') }}" class="pull-right btn btn-success ">Crear nuevo
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <!--<th>Imagen</th>-->
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <!--<td>{{ $product->image }}</td>-->
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ url('products', $products->id) }}">Mostrar</a>
                                <a href="{{ url('products', $products->id) }}">Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No se encontraron resultados</td>
                        </tr>
                    @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection