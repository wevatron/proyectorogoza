
<div class="col">
      <div class="form-group">
    {!!Form::label('nombre', 'Nombre del Descuento')!!}
    {!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('porcentaje', 'Procentaje del Descuento')!!}
    {!!Form::number('porcentaje', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('costo_fijo', 'Costo Fijo del Descuento')!!}
    {!!Form::number('costo_fijo', null, ['class'=> 'form-control'])!!}
  </div>
</div>



  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("descuento.index")}}" class="btn btn-warning">Regresar</a>
