@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Ventas,['route'=>['venta.update', $Ventas->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Ventas.form')
  {!!Form::close()!!}
  <form action="{{route('venta.destroy',$Ventas->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
