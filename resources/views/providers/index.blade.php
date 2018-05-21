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
                    <h4 class="title">Listado</h4>
                    <p class="category">Todos los proveedores</p>
                    
                    <a href="{{ route('providers.create') }}" class="pull-right btn btn-success ">
                        <i class="ti-plus"></i>
                        Nuevo
                    </a>
                    
                    <a href="{{ route('orders.index') }}" class="pull-right btn btn-default" style="margin-right: 5px;">
                        <i class="ti-shopping-cart"></i>
                        Pedidos
                    </a>
                </div>
                <div class="content table-responsive">
                    <table class="table table-border">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Rif</th>
                            <th>Razón social</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($providers as $provider)
                        <tr>
                            <td>{{ $provider->id }}</td>
                            <td>{{ $provider->dni }}</td>
                            <td>{{ $provider->name }}</td>
                            <td>
                                <a href="{{ route('providers.show', $provider->id) }}" class="btn btn-info btn-sm"> 
                                    <i class="ti-eye"></i>
                                </a>

                                <a href="{{ route('orders.create', ['provider_id' => $provider->id]) }}" class="btn btn-sm"> 
                                    <i class="ti-shopping-cart-full"></i>
                                </a>
                                
                                <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning btn-sm">                                 
                                    <i class="ti-pencil"></i>
                                </a>
                                
                                <a href="{{ route('providers.destroy', $provider->id) }}" class="btn btn-danger btn-sm">
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