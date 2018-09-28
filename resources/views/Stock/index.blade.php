@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('Stock.create')}} ">Agregar a Stock</a>
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
          @foreach($Stock as $Stoc)
          <tr>

            <td> {{ $Stoc->id }} </td>
            <td> {{ $Stoc->nombre }} </td>
            <td> {{ $Stoc->rfc }}  </td>
            <td> {{ $Stoc->direccion }}  </td>
            <td> {{ $Stoc->telefono }}  </td>
            <td> {{ $Stoc->correo_electronico }}  </td>
            <td> <a href=" {{route('Stock.edit', ['id'=> $Stoc->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Stock->render()}}
    </div>
  </div>
@endsection
