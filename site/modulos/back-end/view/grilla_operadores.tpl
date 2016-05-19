{include file="header.tpl"
css='<link rel="stylesheet" href="./modulos/back-end/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="./modulos/back-end/css/jquery.dataTables.css">'
js='' 
}
{include file="panelLateral.tpl"}
  <!-- =============================================== -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
      <h1>
        Operadores
        <small>Altas - Modificaciones - Bajas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Administración</a></li>
        <li class="active">Lista Operadores</li>
      </ol>
    </section>
   <!-- /Content Header (Page header) -->  
   
   <!-- CONTENIDO -->
    <section class="content">
      <form action="/operador.php?modulo=nuevoOperador" method="post" id="myForm">
        <!-- 1 box Largo --> 
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Acciones:</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box-tools -->
          </div><!-- /.box-header -->
          <div class="box-body">
                <button class="btn btn-app "  id="btnNuevo" type="submit" name="accion" value="nuevo">
                  <i class="fa fa-plus"></i> Nuevo
                </button>
                <button class="btn btn-app " id="btnModificar" type="submit" name="accion" value="editar" disabled>
                  <i class="fa fa-edit"></i> Editar
                </button>
                <button class="btn btn-app " id="btnBorrar" data-toggle="modal" data-target="#myModal"  name="accion" value="borrar" disabled>
                  <i class="fa fa-trash"></i> Borrar
                </button>
                
                <!-- Modal para Borrar-->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar Operadores </h4></h4>
                      </div>
                      <div class="modal-body">
                        <p>Esta acción eliminará los Operadores seleccionados. ¿Esta seguro que desea continuar?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn btn-danger" id="confirmaBorrado" data-dismiss="modal" onclick = "deleteRow('grilla')">Si, estoy seguro.</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, llévame a donde estaba.</button>
                      </div>
                    </div>
                
                  </div>
                </div> <!-- End Modal Content -->
                
                
                
                
                
          </div><!-- /.box-body -->
        </div>
        <!-- /1 box --> 
  
        
  
        
        <table id="grilla" class="display" >
          <thead>
            
              <tr>
                  <th></th>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Correo</th>
                  <th>Activo</th>
              </tr>
          </thead>
          <tbody>
             {foreach from=$Operadores item=operador}
                  <tr>
                      <td><input class="case" type="checkbox" name="operadorId[]" value="{$operador->getOperadorId()}" ></input></td>
                      <td>{$operador->getNombreUsuario()}</td>
                      <td>{$operador->getNombre()}</td>
                      <td>{$operador->getApellido()}</td>
                      <td>{$operador->getEmail()}</td>
                      <td>{if $operador->getActivo()}Activo{else}Inactivo{/if}</td>
                  </tr>
              {/foreach}
          </tbody>
      </table>

     </form>
    </section>
    <!-- /.content -->
    
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}bootstrap.min.js"></script>
<!-- SlimScroll -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}fastclick.js"></script>
<!-- AdminLTE App -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}app.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="{$rutaJS}jquery.dataTables.js"></script>

{literal}
<script>
$("#confirmaBorrado").click(function(e){
   // e.preventDefault();
    // validate form inputs
   var accion=$('<input />').attr('type', 'hidden')
          .attr('name', "accion")
          .attr('value', "borrar")
          .appendTo('#myForm');
        $("#myForm").submit();
    //$('#myModal').modal('show'); 
});
$("#btnBorrar").click(function(e){
    e.preventDefault();
    // validate form inputs
    // if validated
    //$("#myForm").submit()
    //$('#myModal').modal('show'); 
});

</script>
{/literal}

<!-- Baja Visual -->
<!-- <script type="text/javascript" charset="utf8" src="{$rutaJS}bajaVisual.js"></script> -->

<!-- Manejador de botones y Checkbox-->
<script type="text/javascript" charset="utf8" src="{$rutaJS}chkboxManager.js"></script>
<script type="text/javascript" charset="utf8" src="{$rutaJS}checkAll.js"></script>







{literal}

<script>

$(document).ready( function () {
    $('#grilla').DataTable({
  "columnDefs": [
    { "width": "5px", "targets": 0 }
  ]
});
} );
</script>
{/literal}

<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}