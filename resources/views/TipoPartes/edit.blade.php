@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($TipoPartes,['route'=>['tipoparte.update', $TipoPartes->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('TipoPartes.form')
  {!!Form::close()!!}
  <form action="{{route('tipoparte.destroy',$TipoPartes->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
