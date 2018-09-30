
<div class="col">
  <div class="form-group">
    {!!Form::text('cliente_id',$cliente, ['class'=> 'form-control','hidden'])!!}
    {!!Form::label('descuento_id', 'Nombre del Descuento')!!}
    {!!Form::text('descuento_id', null, ['class'=> 'form-control','id'=>'tags'])!!}
  </div>
</div>







{!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

<a href=" {{route("cliente.show",['id'=> $cliente])}}" class="btn btn-warning">Regresar</a>

<script>

  $( function() {
    $.get('/clientedescuentoasync',function(dato){
      var descuentos = [];
      for (var i=0; i<dato.length;i++)
        descuentos.push(dato[i].id+'-'+dato[i].nombre);
      $( "#tags" ).autocomplete({
        source:descuentos
      });

    });
  });
  </script>
