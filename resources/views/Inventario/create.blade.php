@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::open(['route'=> 'stock.store','onsubmit' => 'return confirm("¿Seguro que desea guardarlo?")'])!!}
    @include('Stock.form')
  {!!Form::close()!!}
@endsection
