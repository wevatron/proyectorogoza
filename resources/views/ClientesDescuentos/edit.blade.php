@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($ClientesDescuentos,['route'=>['clientedescuento.update', $id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('ClientesDescuentos.form')
  {!!Form::close()!!}
  <form action="{{route('clientedescuento.destroy',$id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
