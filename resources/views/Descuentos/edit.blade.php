@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Descuentos,['route'=>['descuento.update', $Descuentos->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Descuentos.form')
  {!!Form::close()!!}
  <form action="{{route('descuento.destroy',$Descuentos->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
