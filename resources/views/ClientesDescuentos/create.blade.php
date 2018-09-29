@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'clientedescuento.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('ClientesDescuentos.form')
  {!!Form::close()!!}
@endsection
