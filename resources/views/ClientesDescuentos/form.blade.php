
<div class="col">
  <div class="form-group">
    {!!Form::text('cliente_id',$cliente, ['class'=> 'form-control','hidden'])!!}
    {!!Form::label('descuento_id', 'Nombre del Descuento')!!}
    {!!Form::text('descuento_id', $ClientesDescuentos->descuento_id."-".$ClientesDescuentos->nombre, ['class'=> 'form-control','id'=>'tags'])!!}
    <a id='botonauto' onclick="ocultar('tags','botonauto');" class="btn btn-warning">a</a>
  </div>
</div>
{!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

<a href=" {{route("cliente.show",['id'=> $cliente])}}" class="btn btn-warning">Regresar</a>

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

    $.get('/clientedescuentoasync',function(dato){
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
