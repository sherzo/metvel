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
                    <a href="{{ route('products.create') }}" class="pull-right btn btn-success ">
                        <i class="ti-plus"></i>
                        Nuevo
                    </a>

                </div>
                <div class="content table-responsive">
                    <table class="table table-border">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <!--<td>{{ $product->image }}</td>-->
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm"> 
                                    <i class="ti-eye"></i>
                                </a>
                                
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">                                 
                                    <i class="ti-pencil"></i>
                                </a>
                                

                                <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger btn-sm">
                                    <i class="ti-close"></i>
                                </a>
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

@section('js')
    @include('components.messages')
@endsection