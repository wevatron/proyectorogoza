@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Catalogo de productos</h3>
      {{Form::open(['route'=>'producto.index','method'=>'GET'])}}
          {{Form::text(' nombre',null, ['id'=>'bus_id','placeholder'=>'Buscar Por Código de Barras','class'=>'form-control'])}}
          
      {{Form::close()}}
      <div class="text-right" style="margin-bottom: 20px">
        <a class="btn btn-primary" href=" {{route('producto.create')}} ">Agregar Producto</a>
      </div>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Descripción Corta</th>
            <th>Descripcion Larga</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Tipo de Parte</th>
            <th>Codigo de Barras</th>
            <th>Precio</th>
            <th>Precio c/IVA</th>
            <th>Comentario</th>
            <th>Editar</th>
            <th>Agregar Stock</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Productos as $Producto)
          <tr>
            <td> {{ $Producto->id }} </td>
            <td> {{ $Producto->nombre }} </td>
            <td> {{ $Producto->descripcion_corta }}  </td>
            <td> {{ $Producto->descripcion_larga }}  </td>
            <td> {{ $Producto->modelo }}  </td>
            <td> {{ $Producto->marca }}  </td>
            <td> {{ $Producto->tipo_parte_id }}  </td>
            <td> {{ $Producto->codigo_barras }}  </td>
            <td> {{ $Producto->precio }}  </td>
            <td> {{ $Producto->precioiva }}  </td>
            <td> {{ $Producto->comentario }}  </td>
            <td> <a href=" {{route('producto.edit', ['id'=> $Producto->id] )}}  " class="btn btn-default">Editar</a> </td>
            <td> <a href=" {{route('producto.show', ['id'=> $Producto->id] )}}  " class="btn btn-success">+</a> </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {!!$Productos->appends(Request::only(['nombre']))->render()!!}
    </div>
  </div>
@endsection
