@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'transaccion.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Transacciones.form')
  {!!Form::close()!!}
@endsection
