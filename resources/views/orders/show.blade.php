@extends('layouts.main')

@section('title', 'Ordenes')

@section('subtitle')
	<a class="navbar-brand" href="{{ url('orders') }}">Ordenes</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    {{--<h4 class="title">Cliente: {{ $order->client->name }}</h4>--}}
                    <p class="category"></p>
                    <a class="pull-right" href="{{ route('orders.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>
                </div>
                <br>
                <div class="content">
                    <div class="row">
                        <div class="col-md-4">
                            <p><b>Cliente</b></p>
                            <p>{{ $order->provider->name }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Cédula o Rif</b></p>
                            <p>{{ $order->provider->dni }}</p>
                        </div>
                        <div class="col-md-4">
                            <p><b>Orden</b></p>
                            <p>#00{{ $order->id }}</p>
                            <p>{{ $date->format('d-m-Y') }}</p>
                        </div>
                    </div>

                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->products as $product)
                            <tr>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->description }}
                                </td>
                                <td>
                                    {{ $product->pivot->quantity }}
                                </td>
                                <td>
                                    {{ $product->pivot->amount }}
                                </td>
                                <td>
                                    {{ $product->pivot->amount * $product->pivot->quantity }}
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right" >Subtotal</td>
                                    <td>{{ $order->subtotal }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">I.V.A.</td>
                                    <td>{{ $order->iva }}</td>
                                </tr>
                                <tr class="bg-success">
                                    <td colspan="4" class="text-right"><b>Total</b></td>
                                    <td><b>{{ $order->total }}</b></td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection