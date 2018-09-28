
<div class="col">
      <div class="form-group">
    {!!Form::label('monto', 'Monto')!!}
    {!!Form::text('monto', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('descuento_id', 'Descuento')!!}
    {!!Form::text('descuento_id', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('subtotal', 'Subtotal')!!}
    {!!Form::text('subtotal', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('iva', 'IVA')!!}
    {!!Form::text('iva', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('total', 'Total')!!}
    {!!Form::text('total', null, ['class'=> 'form-control'])!!}
  </div>
</div>

  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("venta.index")}}" class="btn btn-warning">Regresar</a>
