
<div class="col">
      <div class="form-group">
    {!!Form::label('nombre', 'Nombre del Cliente')!!}
    {!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('rfc', 'RFC del Cliente')!!}
    {!!Form::text('rfc', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('direccion', 'Dirección del Cliente')!!}
    {!!Form::text('direccion', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('telefono', 'Telefono del Cliente')!!}
    {!!Form::text('telefono', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('correo_electronico', 'Correo Electrónico del Cliente')!!}
    {!!Form::text('correo_electronico', null, ['class'=> 'form-control'])!!}
  </div>
</div>


  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("cliente.index")}}" class="btn btn-warning">Regresar</a>
