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
                    <p class="category">provideros con sus categorías</p>
                    <a href="{{ route('providers.create') }}" class="pull-right btn btn-success ">Crear nuevo
                        <i class="ti-pluss"></i>
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
                            <td>{{ $provider->stock }}</td>
                            <td>
                                <a href="{{ route('providers.show', $provider->id) }}">   Mostrar
                                </a>
                                
                                <a href="{{ route('providers.edit', $provider->id) }}">   Editar
                                </a>
                                

                                <a href="{{ route('providers.destroy', $provider->id) }}">
                                    Eliminar
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