@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Inventario fisico general</h3>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Producto id</th>
            <th>Existencias</th>
            <th>Descripcion</th>
            <th>Codigo de barras</th>
            <th>Precio de venta con iva</th>
            <th></th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($Stock as $Stoc)
          <tr>

            <td> {{ $Stoc->producto_id }} </td>
            <td> {{ $Stoc->existencias }} </td>
            <td> {{ $Stoc->descripcion }} </td>
            <td> {{ $Stoc->codigo }} </td>
            <td> {{ $Stoc->iva }} </td>
            <td> <a href=" {{route('producto.show', ['id'=> $Stoc->producto_id] )}}  " class="btn btn-success">ver</a> </td>

          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Stock->render()}}
    </div>
  </div>
@endsection
