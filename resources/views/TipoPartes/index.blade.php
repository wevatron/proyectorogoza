@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('tipoparte.create')}} ">Agregar Tipos de Parte</a>
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
          @foreach($TipoPartes as $TipoParte)
          <tr>

            <td> {{ $TipoParte->id }} </td>
            <td> {{ $TipoParte->nombre }} </td>
            <td> {{ $TipoParte->rfc }}  </td>
            <td> {{ $TipoParte->direccion }}  </td>
            <td> {{ $TipoParte->telefono }}  </td>
            <td> {{ $TipoParte->correo_electronico }}  </td>
            <td> <a href=" {{route('tipoparte.edit', ['id'=> $TipoParte->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $TipoPartes->render()}}
    </div>
  </div>
@endsection
