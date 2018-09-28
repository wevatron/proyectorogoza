@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('producto.create')}} ">Agregar Producto</a>
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
          @foreach($Productos as $Producto)
          <tr>

            <td> {{ $Producto->id }} </td>
            <td> {{ $Producto->nombre }} </td>
            <td> {{ $Producto->rfc }}  </td>
            <td> {{ $Producto->direccion }}  </td>
            <td> {{ $Producto->telefono }}  </td>
            <td> {{ $Producto->correo_electronico }}  </td>
            <td> <a href=" {{route('producto.edit', ['id'=> $Producto->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Productos->render()}}
    </div>
  </div>
@endsection
