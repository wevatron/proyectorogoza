@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Compras,['route'=>['compra.update', $Compras->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Compras.form')
  {!!Form::close()!!}
  <form action="{{route('compra.destroy',$Compras->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
