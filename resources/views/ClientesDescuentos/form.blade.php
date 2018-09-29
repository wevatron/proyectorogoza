
<div class="col">
      <div class="form-group">
    {!!Form::text('cliente_id', $id, ['class'=> 'form-control', 'hidden'])!!}
    {!!Form::label('descuento_id', 'Nombre del Descuento')!!}
    {!!Form::text('descuento_id', null, ['class'=> 'form-control'])!!}
  </div>
</div>


  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("cliente.show",['id'=> $ClientesDescuentos->cliente_id])}}" class="btn btn-warning">Regresar</a>
