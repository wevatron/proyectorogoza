@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Clientes,['route'=>['cliente.update', $Clientes->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Clientes.form')
  {!!Form::close()!!}
  <form action="{{route('cliente.destroy',$Clientes->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
