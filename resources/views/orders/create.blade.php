@extends('layouts.main')

@section('title', 'Orden de compra')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
@endsection

@section('subtitle')
	<a class="navbar-brand" href="{{ url('clients') }}">Orden de compra</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Nueva orden de compra</h4>
                    <p class="category">Ingrese los datos para realizar la orden</p>
                    <a class="pull-right" href="{{ route('providers.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <br>
                <div class="content">
                    {{ Form::open(['route' => 'orders.store']) }}
                    
                        @include('orders.fields')

                        <div class="row" v-show="selected.length > 0">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components/messages')
    <script src="{{ asset('js/src/order.js')}}"></script>    
    <script>
        order.getClientData({{ $provider->id }})
    </script>
@endsection