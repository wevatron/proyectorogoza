@extends('layouts.app')


@section('content')

  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Gestión del cliente</h3>


      <div class="card" style="width: 18rem;">
        <div class="card-header">

          Nombre: {{$Clientes->nombre}}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">RFC: {{$Clientes->rfc}}</li>
          <li class="list-group-item">Direccion: {{$Clientes->direccion}}</li>
          <li class="list-group-item">Telefono: {{$Clientes->telefono}}</li>
          <li class="list-group-item">Correo Electrónico: {{$Clientes->correo_electronico}}</li>
        </ul>
      </div>
    </br>
    </br>
    <div class="text-right" style="margin-bottom: 20px">
      <a class="btn btn-primary" href=" {{route('clientedescuento.show',['id'=> $Clientes->id])}} ">Agregar Descuento Al Cliente</a>
    </div>

      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Porcentaje</th>
            <th>Costo Fijo</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($ClientesDescuentos as $ClienteDescuento)
          <tr>

            <td> {{ $ClienteDescuento->id_cliente_descuento}} </td>
            <td> {{ $ClienteDescuento->nombre }} </td>
            <td> {{ $ClienteDescuento->porcentaje }}  </td>
            <td> {{ $ClienteDescuento->costo_fijo }}  </td>
            <td> <a href=" {{route('clientedescuento.edit', ['id'=> $ClienteDescuento->id_cliente_descuento] )}}  " class="btn btn-info">Editar</a> </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
