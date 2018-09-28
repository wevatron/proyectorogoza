
<div class="col">
      <div class="form-group">
    {!!Form::label('cantidad', 'Cantidad')!!}
    {!!Form::number('cantidad', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('proveedor_id', 'Proveedor')!!}
    {!!Form::text('proveedor_id', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('producto_id', 'Producto')!!}
    {!!Form::text('producto_id', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('precio_compra', 'Precio de Compra')!!}
    {!!Form::number('precio_compra', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('precio_venta', 'Precio de Venta')!!}
    {!!Form::number('precio_venta', null, ['class'=> 'form-control'])!!}
  </div>
</div>

  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("stock.index")}}" class="btn btn-warning">Regresar</a>
