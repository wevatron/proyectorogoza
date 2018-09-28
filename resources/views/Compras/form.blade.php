
<div class="col">
      <div class="form-group">
    {!!Form::label('monto', 'Monto')!!}
    {!!Form::number('monto', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
  <div class="form-group">
    {!!Form::label('descuento', 'Descuento')!!}
    {!!Form::number('descuento', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('iva', 'IVA')!!}
    {!!Form::number('iva', null, ['class'=> 'form-control'])!!}
  </div>
</div>


<div class="col">
      <div class="form-group">
    {!!Form::label('subtotal', 'Subtotal')!!}
    {!!Form::number('subtotal', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('total', 'Total')!!}
    {!!Form::number('total', null, ['class'=> 'form-control'])!!}
  </div>
</div>

  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("compra.index")}}" class="btn btn-warning">Regresar</a>
