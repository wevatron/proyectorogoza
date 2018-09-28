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
            <th>Nombre</th>
            <th>RFC</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Correo Electrónico</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Compras as $Compra)
          <tr>

            <td> {{ $Compra->id }} </td>
            <td> {{ $Compra->nombre }} </td>
            <td> {{ $Compra->rfc }}  </td>
            <td> {{ $Compra->direccion }}  </td>
            <td> {{ $Compra->telefono }}  </td>
            <td> {{ $Compra->correo_electronico }}  </td>
            <td> <a href=" {{route('compra.edit', ['id'=> $Compra->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Compras->render()}}
    </div>
  </div>
@endsection
