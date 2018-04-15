@extends('layouts.main')

@section('title', 'Inicio')

@section('subtitle')
    <a class="navbar-brand" href="/home">Inicio</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Inicio</h4>
            </div>

            <div class="content">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
