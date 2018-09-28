@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('transaccion.create')}} ">Agregar Transaccion</a>
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
          @foreach($Transacciones as $Transaccion)
          <tr>

            <td> {{ $Transaccion->id }} </td>
            <td> {{ $Transaccion->nombre }} </td>
            <td> {{ $Transaccion->rfc }}  </td>
            <td> {{ $Transaccion->direccion }}  </td>
            <td> {{ $Transaccion->telefono }}  </td>
            <td> {{ $Transaccion->correo_electronico }}  </td>
            <td> <a href=" {{route('transaccion.edit', ['id'=> $Transaccion->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Transacciones->render()}}
    </div>
  </div>
@endsection
