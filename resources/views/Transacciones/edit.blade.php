@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Transacciones,['route'=>['cliente.update', $Transacciones->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Transacciones.form')
  {!!Form::close()!!}
  <form action="{{route('transaccion.destroy',$Transacciones->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
