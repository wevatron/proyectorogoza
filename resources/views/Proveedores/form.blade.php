
<div class="col">
      <div class="form-group">
    {!!Form::label('nombre', 'Nombre del Proveedor')!!}
    {!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('RFC', 'RFC del Proveedor')!!}
    {!!Form::text('RFC', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('direccion', 'Dirección del Proveedor')!!}
    {!!Form::text('direccion', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('telefono', 'Telefono del Proveedor')!!}
    {!!Form::text('telefono', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('clave_interbancaria', 'Clave Interbancaria Proveedor')!!}
    {!!Form::text('clave_interbancaria', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('cuenta', 'No. de Cuenta del Proveedor')!!}
    {!!Form::text('cuenta', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('cuenta_debito', 'Cuenta de Débito del Proveedor')!!}
    {!!Form::text('cuenta_debito', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('correo_electronico', 'Correo Electrónico del Proveedor')!!}
    {!!Form::text('correo_electronico', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('banco', 'Banco del Proveedor')!!}
    {!!Form::text('banco', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('descripcion', 'Descripción del Proveedor')!!}
    {!!Form::text('descripcion', null, ['class'=> 'form-control'])!!}
  </div>
</div>

  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("proveedor.index")}}" class="btn btn-warning">Regresar</a>
