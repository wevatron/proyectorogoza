@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('compra.create')}} ">Agregar Compra</a>
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
          @foreach($Compras as $Compra)
          <tr>

            <td> {{ $Compra->id }} </td>
            <td> {{ $Compra->monto }} </td>
            <td> {{ $Compra->descuento }}  </td>
            <td> {{ $Compra->iva }}  </td>
            <td> {{ $Compra->subtotal }}  </td>
            <td> {{ $Compra->total }}  </td>
            <td> <a href=" {{route('compra.edit', ['id'=> $Compra->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Compras->render()}}
    </div>
  </div>
@endsection
