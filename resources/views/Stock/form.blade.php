
<div class="col">
  <div class="form-group">
    {!!Form::text('producto_id', $id, ['class'=> 'form-control','hidden'])!!}
    {!!Form::label('cantidad', 'Cantidad')!!}
    {!!Form::number('cantidad', null, ['class'=> 'form-control'])!!}
  </div>
</div>

<div class="col">
      <div class="form-group">
    {!!Form::label('l_proveedor_id', 'Proveedor')!!}
    @if(isset($Proveedor))
      {!!Form::text('l_proveedor_id', $Proveedor->id."-".$Proveedor->nombre, ['class'=> 'form-control','id'=>'l_proveedor_id','disabled'])!!}
    @else
      {!!Form::text('l_proveedor_id',null, ['class'=> 'form-control','id'=>'l_proveedor_id', 'disabled'])!!}
    @endif
    {{ Form::hidden('proveedor_id', null, array('id' => 'proveedor_id')) }} 
    <a id='btn_proveedor_id' onclick="limpiar('l_proveedor_id');" href="#!"><i class="material-icons">edit</i>
</a>
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

<div class="col">
      <div class="form-group">
    {!!Form::label('l_bodega_id', 'Bodega')!!}
    {!!Form::text('l_bodega_id',null, ['class'=> 'form-control','id'=>'l_bodega_id', 'disabled'])!!}
    {{ Form::hidden('bodega_id', "", array('id' => 'bodega_id','required')) }} 
     <a id='btn_proveedor_id' onclick="limpiar('l_bodega_id');" href="#!"><i class="material-icons">edit</i>
</a>
  </div>
</div>

  {!!Form::button("Guardar", ['type'=>'submit','class'=> 'btn btn-success'])!!}

  <a href=" {{route("producto.show",$id)}}" class="btn btn-warning">Regresar</a>

  <script>

  function limpiar(target){
      $('#'+target).attr('disabled', false).val('').focus();
      $('#'+target.substr(2)).val("");
    }


  $(document).ready(function() {



    $( "#l_proveedor_id" ).autocomplete({
            source:'{!!URL::route('proveedorasync')!!}',
            minlength:1,
            autoFocus:true,
               change: function (event, ui) { 
                 
             },
            select:function(e,ui)
            {

              $('#proveedor_id').val(ui.item.miid);
              $('#l_proveedor_id').attr('disabled', true)
              
             
            }
        });    

    $( "#l_bodega_id" ).autocomplete({
            source:'{!!URL::route('bodegaasync')!!}',
            minlength:1,
            autoFocus:true,
               change: function (event, ui) { 
                 
             },
            select:function(e,ui)
            {
              console.log(ui.item.miid);
              $('#bodega_id').val(ui.item.miid);
              $('#l_bodega_id').attr('disabled', true)
              
             
            }
        });    
});
    </script>
