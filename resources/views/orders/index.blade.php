@extends('layouts.main')

@section('title', 'Ordenes de despacho')

@section('subtitle') 
	<a class="navbar-brand" href="{{ url('orders') }}">Ordenes de compra</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Listado</h4>
                    <p class="category">Todos las ordenes de despacho</p>
                    &nbsp;
                    <a href="{{ route('providers.index') }}" style="margin-right: 5px;"  class="pull-right btn btn-info">
                        <i class="ti-truck"></i>
                        Proveedores
                    </a>&nbsp;
                </div>
                
                <div class="content table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Nro.</th>
                                <th>Porveedor</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>#00{{ $order->id }}</td>
                                    <td>{{ $order->provider->name }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm"> 
                                            <i class="ti-eye"></i>
                                        </a>
                                        
                                        <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-danger btn-sm">
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