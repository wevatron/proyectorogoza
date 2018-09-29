@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Inventario</h3>
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('stock.create')}} ">Agregar a Stock</a>
      </div>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Cantidad</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Precio de Compra</th>
            <th>Precio de Venta</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Stock as $Stoc)
          <tr>

            <td> {{ $Stoc->id }} </td>
            <td> {{ $Stoc->cantidad }} </td>
            <td> {{ $Stoc->proveedor_id }}  </td>
            <td> {{ $Stoc->producto_id }}  </td>
            <td> {{ $Stoc->precio_compra }}  </td>
            <td> {{ $Stoc->precio_venta }}  </td>
            <td> <a href=" {{route('stock.edit', ['id'=> $Stoc->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Stock->render()}}
    </div>
  </div>
@endsection
