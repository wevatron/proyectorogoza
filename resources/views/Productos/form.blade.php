
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
    {!!Form::text('tipo_parte_id',null, ['class'=> 'form-control'])!!}
      <a id='botonauto' onclick="ocultar('tipo_parte_id','botonauto');" class="btn btn-warning">Editar</a>
  </div>
</div>

<input type="hidden" name="" value="" id="tipo_parte_id_check" required="true">

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
      $('#'+tarjet+'_check').val("");
      $('#'+boton).hide();

}

function asignarAuto(tarjet,boton){

    $('#'+boton).show();
      $('#'+tarjet).prop('disabled', true);
      $('#'+tarjet+'_check').val(1);
      
    
}

/*
  $( function() {
    if($('#tipo_parte_id').val()==""){

      $('#botonauto').prop('disabled', false);
    }else{
      $('#tipo_parte_id').prop('disabled', true);
      $('#botonauto').prop('disabled', false);
    }

    $.get('/productotipoparteasync',function(dato){
      var descuentos = [];
      for (var i=0; i<dato.length;i++)
        descuentos.push(dato[i].id+'-'+dato[i].nombre);

      console.log(descuentos);
let partes = [];
      $( "#tipo_parte_id" ).autocomplete({
        source:partes,
        select: function (event, ui) { 
         asignarAuto("tipo_parte_id", "botonauto");
         console.log(ui.item);
        }
      });


    });




  });

  */


  $(document).ready(function() {
    src = '/productotipoparteasync';

    // Load the cities straight from the server, passing the country as an extra param
    $("#tipo_parte_id").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function(data) {
                    console.log(data[0].id);
                    response(data);
                }
            });
        },
        select: function (event, ui) { 
         //asignarAuto("tipo_parte_id", "botonauto");
         console.log(ui.item);
        },
        min_length: 3,
        delay: 300
    });
});
  </script>












  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("producto.index")}}" class="btn btn-warning">Regresar</a>
