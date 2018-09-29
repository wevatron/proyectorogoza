@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Catalogo de descuentos</h3>
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('descuento.create')}} ">Agregar Descuento</a>
      </div>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Procentaje</th>
            <th>Costo Fijo</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Descuentos as $Descuento)
          <tr>

            <td> {{ $Descuento->id }} </td>
            <td> {{ $Descuento->nombre }} </td>
            <td> {{ $Descuento->porcentaje }}  </td>
            <td> {{ $Descuento->costo_fijo }}  </td>
            <td> <a href=" {{route('descuento.edit', ['id'=> $Descuento->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $Descuentos->render()}}
    </div>
  </div>
@endsection
