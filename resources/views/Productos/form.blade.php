
<div class="col">
      <div class="form-group">
    {!!Form::label('nombre', 'Nombre del Producto')!!}
    {!!Form::text('nombre', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('descripcion_corta', 'Descripción Corta')!!}
    {!!Form::text('descripcion_corta', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('descripcion_larga', 'Descripción Larga')!!}
    {!!Form::text('descripcion_larga', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('modelo', 'Modelo del Producto')!!}
    {!!Form::text('modelo', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('marca', 'Marca del Producto')!!}
    {!!Form::text('marca', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('tipo_parte_id', 'Tipo de Parte')!!}
    {!!Form::number('tipo_parte_id', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('codigo_barras', 'Código de Barras')!!}
    {!!Form::text('codigo_barras', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('numero_parte', 'Número de Parte')!!}
    {!!Form::number('numero_parte', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('stock_id', 'Stock')!!}
    {!!Form::number('stock_id', null, ['class'=> 'form-control'])!!}
  </div>
</div>










  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("producto.index")}}" class="btn btn-warning">Regresar</a>
