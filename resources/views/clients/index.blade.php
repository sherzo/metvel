@extends('layouts.main')
@section('title', 'Clientes')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('clients') }}">Clientes</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Listado</h4>
                    <p class="category">Todos los clientes</p>
                    &nbsp;
                    <a href="{{ route('clients.create') }}" class="pull-right btn btn-success ">
                        <i class="ti-plus"></i>
                        Nuevo
                    </a>
                    &nbsp;
                    <a href="{{ route('clients.create') }}" style="margin-right: 5px;"  class="pull-right btn btn-info">
                        <i class="ti-shopping-cart-full"></i>
                        Despacho
                    </a>&nbsp;


                </div>
                <div class="content table-responsive">
                    <table class="table table-border">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cédula o Rif</th>
                            <th>Razón social</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>
                            <td>{{ $client->dni }}</td>
                            <td>{{ $client->name }}</td>
                            <td>
                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm"> 
                                    <i class="ti-eye"></i>
                                </a>

                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm"> 
                                    <i class="ti-truck"></i>
                                </a>
                                
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">                                 
                                    <i class="ti-pencil"></i>
                                </a>
                                
                                <a href="{{ route('clients.destroy', $client->id) }}" class="btn btn-danger btn-sm">
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