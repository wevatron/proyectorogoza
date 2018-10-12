@extends('layouts.app')



@section('content')

    <div class="row justify-content-center text-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h4>Refaccionaria Grijalva</h4></div>
                <div class="card-header text-right">FECHA: {{$transaccion->created_at}}
                    <div>OAXACA DE JUAREZ, SANTA LUCIA DEL CAMINO</div>
                    <div>CLIENTE: {{$cliente->nombre}}</div>
                    <div>FOLIO: {{$transaccion->id}}</div>
                </div>



                <div class="card-body">
                    <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" width="20%">Cantidad</th>
                      <th scope="col" width="60%">Articulo</th>
                      <th scope="col" width="10%">Precio</th>
                      <th scope="col" width="10%">Importe</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $totalLocal = 0; ?>
                    @foreach($desgloses as $desglose)
                    <?php $totalLocal = ($totalLocal) + (floatVal($desglose->cantidad*$desglose->precio_venta)*-1) ?>
                    <tr>
                      <td>{{intVal($desglose->cantidad)*-1}}</th>
                      <td>{{$desglose->nombre}}</td>
                      <td>{{floatVal($desglose->precio_venta)}}</td>
                      <td>{{floatVal($desglose->cantidad*$desglose->precio_venta)*-1}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <th scope="col" width="20%"></th>
                      <th scope="col" width="60%"></th>
                      <tH scope="col" width="10%">Total</tH>
                      <th scope="col" width="10%">Total + IVA</th>

                    </tr>
                    <tr></tr>
                    <tr>
                      <td width="20%"></td>
                      <td width="60%"></td>
                      <td width="10%">{{ floatVal($totalLocal) }}</td>
                      <td width="10%">{{ floatVal($totalLocal*1.16) }}</td>
                    </tr>

                  </tbody>
                </table>
                <a href=" {{route('reporte.show', ['id'=> $transaccion->id] )}}  " class="btn btn-success">Generar Ticket</a> 
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
   console.log({{$desgloses}}) ;
</script>

@endsection
