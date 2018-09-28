@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('venta.create')}} ">Agregar Venta</a>
      </div>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Monto</th>
            <th>Descuento</th>
            <th>IVA</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Ventas as $Venta)
          <tr>

            <td> {{ $Venta->id }} </td>
            <td> {{ $Venta->monto }} </td>
            <td> {{ $Venta->descuento }}  </td>
            <td> {{ $Venta->iva }}  </td>
            <td> {{ $Venta->subtotal }}  </td>
            <td> {{ $Venta->total }}  </td>
            <td> <a href=" {{route('venta.edit', ['id'=> $Venta->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Ventas->render()}}
    </div>
  </div>
@endsection
