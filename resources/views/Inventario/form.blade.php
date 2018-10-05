
<div class="col">
  <div class="form-group">
    {!!Form::text('producto_id', $id, ['class'=> 'form-control','hidden'])!!}
    {!!Form::label('cantidad', 'Cantidad')!!}
    {!!Form::number('cantidad', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('proveedor_id', 'Proveedor')!!}
    @if(isset($Proveedor))
      {!!Form::text('proveedor_id', $Proveedor->id."-".$Proveedor->nombre, ['class'=> 'form-control','id'=>'tags'])!!}
    @else
      {!!Form::text('proveedor_id',null, ['class'=> 'form-control','id'=>'tags'])!!}
    @endif
    <a id='botonauto' onclick="ocultar('tags','botonauto');" class="btn btn-warning">a</a>
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

  <a href=" {{route("producto.show",$id)}}" class="btn btn-warning">Regresar</a>

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

      $.get('/proveedorasync',function(dato){
        var descuentos = [];
        for (var i=0; i<dato.length;i++)
          descuentos.push(dato[i].id+'-'+dato[i].nombre);
        $( "#tags" ).autocomplete({
          source:descuentos,
          onAutocomplete: function(val) {
            asignarAuto("tags", "botonauto");
          }
        });

      });
    });
    </script>
