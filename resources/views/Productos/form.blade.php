
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
    {!!Form::label('l_tipo_parte_id', 'Tipo de Parte')!!}
    @if(isset($tipo_partes[0]->nombre) )
    {!!Form::text('l_tipo_parte_id',$tipo_partes[0]->nombre, ['class'=> 'form-control', 'disabled'])!!}
    @else
    {!!Form::text('l_tipo_parte_id',null, ['class'=> 'form-control', 'disabled'])!!}
    @endif
    {{ Form::hidden('tipo_parte_id', null, array('id' => 'tipo_parte_id')) }} 
     
      <a id='btn_tipo_parte_id' onclick="limpiar('l_tipo_parte_id');" href="#!"><i class="material-icons">edit</i>
</a>
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

    function limpiar(target){
      $('#'+target).attr('disabled', false).val('').focus();
      $('#'+target.substr(2)).val("");
    }


  $(document).ready(function() {



    $( "#l_tipo_parte_id" ).autocomplete({
            source:'{!!URL::route('productotipoparteasync')!!}',
            minlength:1,
            autoFocus:true,
               change: function (event, ui) { 
                 
             },
            select:function(e,ui)
            {

              $('#tipo_parte_id').val(ui.item.miid);
              $('#l_tipo_parte_id').attr('disabled', true)
              
             
            }
        });    
});
  </script>












  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("producto.index")}}" class="btn btn-warning">Regresar</a>
