@extends('layouts.app')

@section('content')
  @include ('layouts/error')
  {!!Form::model($Stock,['route'=>['stock.update', $Stock->id],'method'=>'PUT','onsubmit' => 'return confirm("¿Seguro que desea actualizar?")'])!!}
    @include('Stock.form')
  {!!Form::close()!!}
  <form action="{{route('stock.destroy',$Stock->id)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE" >
    <button class="btn btn-danger">Eliminar</button>
  </form>
@endsection
