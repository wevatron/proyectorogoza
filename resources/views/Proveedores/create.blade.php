@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'proveedor.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Proveedores.form')
  {!!Form::close()!!}
@endsection
