@extends('layouts.main')

@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.min.css') }}">
@endsection

@section('subtitle')
	<a class="navbar-brand" href="{{ url('maintenance') }}">Usuarios</a>
@endsection

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Crear nuevo usuario</h4>
                    <p class="category">Ingrese los datos para registrar un usuarios</p>
                    <a class="pull-right" href="{{ route('maintenance.index') }}" >Volver
                        <i class="ti-pluss"></i>
                    </a>

                </div>
                <div class="content">
                    {{ Form::open(['route' => 'users.store']) }}

                        @include('maintenance.fields')

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
@endsection