
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
    {!!Form::text('tipo_parte_id', $Productos->tipo_parte_id."-".$Productos->nombre, ['class'=> 'form-control'])!!}
      <a id='botonauto' onclick="ocultar('tipo_parte_id','botonauto');" class="btn btn-warning">a</a>
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
    {!!Form::label('precio', 'Precio de Lista')!!}
    {!!Form::number('precio', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('precioiva', 'Precio con IVA')!!}
    {!!Form::number('precioiva', null, ['class'=> 'form-control'])!!}
  </div>
</div>


<div class="col">
      <div class="form-group">
    {!!Form::label('comentario', 'Comentario')!!}
    {!!Form::text('comentario', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<script>

function ocultar(tarjet,boton){

      $('#'+tarjet).prop('disabled', false);
      $('#'+tarjet).val("");
      $('#'+boton).hide();

}

function asignarAuto(tarjet,boton){
    if($('#'+boton).prop('disabled', false)){
      $('#'+tarjet).prop('disabled', true);
      $('#'+boton).show();
    }
}
  $( function() {
    if($('#tags').val()==""){

    }else{
      $('#tags').prop('disabled', true);
      $('#botonauto').prop('disabled', false);
    }

    $.get('/productotipoparteasync',function(dato){
      var descuentos = [];
      for (var i=0; i<dato.length;i++)
        descuentos.push(dato[i].id+'-'+dato[i].nombre);
      $( "#tipo_parte_id" ).autocomplete({
        source:descuentos,
        onAutocomplete: function(val) {
          asignarAuto("tags", "botonauto");
        }
      });

    });
  });
  </script>












  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("producto.index")}}" class="btn btn-warning">Regresar</a>
