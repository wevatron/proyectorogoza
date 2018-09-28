
<div class="col">
      <div class="form-group">
    {!!Form::label('nombre', 'Nombre')!!}
    {!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('descripcion', 'Descripción')!!}
    {!!Form::text('descripcion', null, ['class'=> 'form-control'])!!}
  </div>
</div>

  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("tipoparte.index")}}" class="btn btn-warning">Regresar</a>
