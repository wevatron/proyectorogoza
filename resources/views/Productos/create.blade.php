@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'producto.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Productos.form')
  {!!Form::close()!!}
@endsection
