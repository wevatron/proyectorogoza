@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Haz Iniciado Sesión.
                    En la parte superior tienes el menú principal para operar el sistema.
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
