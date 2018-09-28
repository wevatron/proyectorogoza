@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'tipoparte.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('TipoPartes.form')
  {!!Form::close()!!}
@endsection
