@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'venta.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Ventas.form')
  {!!Form::close()!!}
@endsection
