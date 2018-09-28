@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'compra.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Compras.form')
  {!!Form::close()!!}
@endsection
