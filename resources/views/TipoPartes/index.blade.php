@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Catalogo de partes</h3>
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('tipoparte.create')}} ">Agregar Tipos de Parte</a>
      </div>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($TipoPartes as $TipoParte)
          <tr>

            <td> {{ $TipoParte->id }} </td>
            <td> {{ $TipoParte->nombre }} </td>
            <td> {{ $TipoParte->descripcion }}  </td>
            <td> <a href=" {{route('tipoparte.edit', ['id'=> $TipoParte->id] )}}  " class="btn btn-success">Editar</a> </td>


          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $TipoPartes->render()}}
    </div>
  </div>
@endsection
