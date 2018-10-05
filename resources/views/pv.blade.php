@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Punto de venta.</h3>

      
     <div class="row" style="margin-bottom: 3%">
      <div class="col col-lg-6 offset-lg-6">
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Total $</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
          </div>
      </div>
            
     </div>

  
    <div class="input-group mb-3">
      {!! Form::text('cliente_id', null, ['class'=>'form-control', 'placeholder'=>'Cliente']) !!}
      <div class="input-group-append">
        <a href=" {{route('cliente.create')}} " target="_blank"><button class="btn btn-outline-primary" type="button" id="button-addon2">Agregar cliente</button></a>
      </div>
    </div>
                 

      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Código de barras</th>
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
       

          <tr>
            <td></td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> <button class="btn btn-danger">Eliminar</button></td>
          </tr>
    

        </tbody>
      </table>
    
    </div>
  </div>
@endsection
