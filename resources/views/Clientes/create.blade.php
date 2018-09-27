@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'cliente.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Clientes.form')
  {!!Form::close()!!}
@endsection
