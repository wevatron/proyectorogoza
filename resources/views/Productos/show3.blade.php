@extends('layouts.app')


@section('content')

  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Gestión del Stock/Inventario Físico dd</h3>


      <div class="card" style="width: 18rem;">
        <div class="card-header">

          Nombre: {{$Productos->nombre}}
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Descripcion:  {{$Productos->descripcion_corta}}</li>
          <li class="list-group-item">Modelo: {{$Productos->modelo}}</li>
          <li class="list-group-item">Marca: {{$Productos->marca}}</li>
          <li class="list-group-item">Codigo de Barras {{$Productos->codigo_barras}}</li>
          <li class="list-group-item">Precio ${{number_format($Productos->precio,2)}}</li>
          <li class="list-group-item">Precio con IVA ${{number_format($Productos->precioiva,2)}}</li>
        </ul>
      </div>
    </br>
    </br>
    <div class="text-right" style="margin-bottom: 20px">
      <a class="btn btn-primary" href=" {{route('stock.show',['id'=> $Productos->id])}} ">Agregar Stock Al Producto</a>
    </div>

      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            
            <th><--></th>
            <th>Cantidad</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Precio de Compra</th>
            <th>Precio de Venta</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Stocks as $Stock)
          <tr>
            
            <td> {{ $Stock->estado }} </td>
            <td> {{ $Stock->cantidad }} </td>
            <td> {{ $Stock->proveedor_id }}  </td>
            <td> {{ $Stock->producto_id }}  </td>
            <td> {{ $Stock->precio_compra }}  </td>
            <td> {{ $Stock->precio_venta }}  </td>
            <td>
              <form action="{{route('stock.destroy',$Stock->sid)}}" method="POST" onsubmit = 'return confirm("¿Seguro que desea eliminarlo?")'>
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger" id="btndel_id" style="margin-top: 15px" >Cancelar</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $Stocks->render()}}
    </div>
  </div>
@endsection
