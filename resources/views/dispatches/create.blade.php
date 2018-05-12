@extends('layouts.main')

@section('title', 'Orden de despacho')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
@endsection

@section('subtitle')
	<a class="navbar-brand" href="{{ url('clients') }}">Orden de despacho</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Nueva orden de despacho</h4>
                    <p class="category">Ingrese los datos para registrar un cliente</p>
                    <a class="pull-right" href="{{ route('clients.index') }}" >Volver al listado
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    {{ Form::open(['route' => 'dispatches.store']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 5px;">
                                    <label for="">Cédula o Rif</label>
                                    <input type="text" name="" value="{{ $client->dni }}" class="form-control border-input" readonly="">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre o Razón social</label>
                                    <input type="text" name="" value="{{ $client->name }}" class="form-control border-input" readonly="">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                      <label class="form-check-label" for="defaultCheck1">
                                        Usar dirección del cliente
                                      </label>
                                    </div>                                     
                                </div>  
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Forma de pago</label>
                                    <select name="" id="" class="form-control border-input">
                                        @forelse($payments as $id => $payment)
                                            <option value="{{ $id }}">{{ $payment }}</option>
                                        @empty
                                            <option value="">No se encontraron resultados</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Forma de envío</label>
                                    <select name="" id="" class="form-control border-input">
                                        @forelse($shippings as $id => $shipping)
                                            <option value="{{ $id }}">{{ $shipping }}</option>
                                        @empty
                                            <option value="">No se encontraron resultados</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group">
                            <button class="btn">Guardar</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('components/messages')
    <script src="{{ asset('js/src/dispatch.js')}}"></script>    
@endsection