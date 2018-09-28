@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'descuento.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Descuentos.form')
  {!!Form::close()!!}
@endsection
