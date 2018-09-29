@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Catalogo de proveedores</h3>
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('proveedor.create')}} ">Agregar Proveedor</a>
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
          @foreach($Proveedores as $Proveedor)
          <tr>

            <td> {{ $Proveedor->id }} </td>
            <td> {{ $Proveedor->nombre }} </td>
            <td> {{ $Proveedor->RFC }}  </td>
            <td> {{ $Proveedor->direccion }}  </td>
            <td> {{ $Proveedor->telefono }}  </td>
            <td> {{ $Proveedor->correo_electronico }}  </td>
            <td> <a href=" {{route('proveedor.edit', ['id'=> $Proveedor->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Proveedores->render()}}
    </div>
  </div>
@endsection
