@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Proveedores,['route'=>['proveedor.update', $Proveedores->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Proveedores.form')
  {!!Form::close()!!}
  <form action="{{route('proveedor.destroy',$Proveedores->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
