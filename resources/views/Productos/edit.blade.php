@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Productos,['route'=>['producto.update', $Productos->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Productos.form')
  {!!Form::close()!!}
  <form action="{{route('producto.destroy',$Productos->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
