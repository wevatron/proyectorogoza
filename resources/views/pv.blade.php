@extends('layouts.app')

@section('content')
  <div class="row" style="margin-top: 0px">
    <div class="col">
      <h3>Punto de venta.</h3>


     <div class="row" style="margin-bottom: 3%">
      <div class="col col-lg-6 offset-lg-6">
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Total $</span>
            </div>
            <input type="text" class="form-control" id="d_total_id" value="0" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled >
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
          </div>
      </div>

     </div>


    <div class="input-group mb-3">
      {!! Form::text('cliente_id', null, ['class'=>'form-control', 'id'=>'cliente_id', 'placeholder'=>'Codigo']) !!}
      <div class="input-group-append">
        <a href=" {{route('cliente.create')}} " target="_blank"><button class="btn btn-outline-primary" type="button" id="button-addon2">Agregar cliente</button></a>
      </div>
    </div>


      <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th>Nombre del producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th></th>

          </tr>
        </thead>
        <tbody id="t_productos_venta_id" >



        </tbody>
      </table>

    </div>
  </div>


<a href="#!"  id="btn_cobrar_id" style="display: none;" class="btn btn-success"> Cobrar </a>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="input-group input-group-md">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Producto</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="p_nombre_id" disabled="">
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
          </div>

          <div class="input-group input-group-md">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Existencias</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="p_existencias_id" disabled="">
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
          </div>



          <div class="input-group input-group-md">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Descripcion</span>
            </div>
            <textarea class="form-control" aria-label="With textarea" id="p_descripcion_id" disabled=""></textarea>
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
          </div>

          <div class="input-group input-group-md">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Precio con IVA</span>
            </div>
            <input type="number" disabled="" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="d_piva_id" >
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
          </div>

          <div class="input-group input-group-md">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-lg">Cantidad</span>
            </div>
            <input type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="d_cantidad_id" >
                <div class="input-group-append">
                  <span class="input-group-text"></span>
                </div>
          </div>



        <input type="hidden" id="d_idproducto_id" name="">


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a type="button" class="btn btn-primary"  onclick="agregarACarrito();">Agregar</a>
      </div>
    </div>
  </div>
</div>







<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">

        <h4 class="modal-title" id="myModalLabel">¿Quieres terminar la venta?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="modal-btn-si">Si</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>


  <script type="text/javascript">


var modalConfirm = function(callback){

  $("#btn_cobrar_id").on("click", function(){
    $("#mi-modal").modal('show');
  });

  $("#modal-btn-si").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
  });

  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    //Acciones si el usuario confirma
    comprar();
  }else{

  }
});



    const costo_productos = new Array();
    const insert = new Array();
    var total = 0;
    $("#cliente_id").focus();

  function agregarACarrito() {


    let = cantidad = parseInt($("#d_cantidad_id").val());
    let = existencias = parseInt($("#p_existencias_id").val());
    let = nombre = $("#p_nombre_id").val();
    let = costo_iva = $("#d_piva_id").val();
    let = producto_id = parseInt($("#d_idproducto_id").val());

    if (cantidad != NaN && cantidad <= existencias && cantidad > 0) {

      costo_productos.push(costo_iva*cantidad);
      let nInsert = insert.push({
        producto_id:producto_id,
        nombre:nombre,
        cantidad:cantidad,
        costo_iva:costo_iva

      });
    const row = `
                 <tr id='row_${nInsert-1}'>
                 <td>${nombre}</td>
                 <td>${cantidad}</td>
                 <td>${costo_iva}</td>
                 <td>${costo_iva*cantidad}</td>
                 <td><a class="btn btn-danger" href="#!" onclick="eliminarCarrito(${nInsert-1});"><i class="material-icons">delete</i></a></td>
                 <tr>`;
    sumarTotal();

    $("#t_productos_venta_id").append(row);
    $('#exampleModalCenter').modal('hide');
    limpiarModal();
    }else{
      alert("Agrega la cantidad o verificar existencias");
    }


  }

  function verArray(argument) {
    //console.log(costo_productos);
    console.log(insert);
  }

  function comprar() {
    // body...


    $.ajax({
          type: "POST",
          url: '/stockasyn',
          data: {
            somefield: "Some field value",
             _token: '{{csrf_token()}}',
             lalo:insert

              },
          success: function (data) {
             limpriaCobro();
             console.log(data);
             location="/recibo/"+data;

          },
          error: function (data, textStatus, errorThrown) {
              console.log(data);

          },
      });
  }

  function limpiar(target){
      $('#'+target).attr('disabled', false).val('').focus();
      $('#'+target.substr(2)).val("");
    }
     $(document).ready(function() {


      $( "#cliente_id" ).autocomplete({
            source:'{!!URL::route('azInventario')!!}',
            minlength:1,
            autoFocus:true,
               change: function (event, ui) {

             },
            select:function(e,ui)
            {
            //  console.log(ui.item);
              $('#exampleModalCenter').modal('toggle');
              $("#p_nombre_id").val(ui.item.label);
              $("#p_descripcion_id").val(ui.item.descripcion);
              $("#p_existencias_id").val(ui.item.existencias-existenciaLocal(ui.item.producto_id,insert));
              $("#d_idproducto_id").val(ui.item.producto_id);
              $("#d_piva_id").val(ui.item.iva);

              console.log();

            }
        });


    });

    $('#exampleModalCenter').on('hidden.bs.modal', function (e) {
             limpiarModal();
    });
    $('#exampleModalCenter').on('shown.bs.modal', function (e) {
             $("#d_cantidad_id").focus();
    });

function eliminarCarrito(index) {
   insert[index].cantidad = 0;
   costo_productos[index] = 0;
   sumarTotal();
   $("#row_"+index).remove();
}

function limpiarModal(argument) {
  $("#p_nombre_id").val("");
              $("#p_descripcion_id").val("");
              $("#p_existencias_id").val("");
              $("#cliente_id").val("");
              $("#d_idproducto_id").val("");
              $("#d_piva_id").val("");

              $("#d_cantidad_id").val("");
}

    function existenciaLocal(id,query) {
      let i = 0;
      let c = 0;
      query.forEach(e=>{
        if ( query[c].producto_id == id) {
           i = i+query[c].cantidad;
           c++;
        }
      });
      //console.log(i);
        return i;
    }

     function sumarTotal() {
       // body...
       var con = 0;
       costo_productos.forEach(n=>{
        con = parseInt(con)+parseInt(n);
              $("#d_total_id").val(con);
              if (con==0) {
                  $("#btn_cobrar_id").hide();
              }else{
                $("#btn_cobrar_id").show();
              }
       });

     }

     function limpriaCobro() {
           costo_productos.length = 0;
           insert.length = 0;
           total = 0;

           $("#d_total_id").val(0);
           $("#t_productos_venta_id").empty();
           $("#btn_cobrar_id").hide();
     }



</script>









@endsection
