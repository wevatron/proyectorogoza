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
          @foreach($Clientes as $Cliente)
          <tr>

            <td> {{ $Cliente->id }} </td>
            <td> {{ $Cliente->nombre }} </td>
            <td> {{ $Cliente->rfc }}  </td>
            <td> {{ $Cliente->direccion }}  </td>
            <td> {{ $Cliente->telefono }}  </td>
            <td> {{ $Cliente->correo_electronico }}  </td>
            <td> <a href=" {{route('transaccion.edit', ['id'=> $Cliente->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Clientes->render()}}
    </div>
  </div>
@endsection
