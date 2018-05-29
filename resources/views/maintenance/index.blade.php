@extends('layouts.main')

@section('title', 'Mantenimiento')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
@endsection

@section('subtitle')
	<a class="navbar-brand" href="{{ url('maintenance') }}">Mantenimiento</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Mantenimiento</h4>
                    <p class="category">Ingrese los datos para realizar el pedido</p>
                    
                </div>
                <br>
                <div class="content">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">
                                Formas de pago
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#shippings" aria-controls="shippings" role="tab" data-toggle="tab">
                                Formas de envío
                            </a>
                        </li>
                         <li role="presentation">
                            <a href="#users" aria-controls="users" role="tab" data-toggle="tab">
                                Usuarios
                            </a>
                        </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="payments">
                            @include('maintenance.payments')
                        </div>

                        <div class="tab-pane" id="shippings">
                            @include('maintenance.shippings')
                        </div>

                        <div class="tab-pane" id="users">
                            @include('maintenance.users')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components/messages')
    {{-- <script src="{{ asset('js/src/maintenance.js')}}"></script> --}}
@endsection