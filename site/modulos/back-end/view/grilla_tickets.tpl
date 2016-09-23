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
        Tickets
        <small>Departamento: Soporte N1</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Tickets</a></li>
        <li class="active">Lista Tickets</li>
      </ol>
    </section>
   <!-- /Content Header (Page header) -->  
   
   <!-- CONTENIDO -->
    <section class="content">
      <form action="/operador.php?modulo=ticket" method="post" id="myForm">
        <!-- 1 box Largo --> 
        <div class="box box-primary">
          <div class="box-body">
            
            
                <button class="btn btn-app "  id="btnNuevo" type="submit" name="accion" value="nuevo">
                  <i class="fa fa-plus"></i> Nuevo
                </button>
                <button class="btn btn-app" id="btnVer" type="submit" name="accion" value="ver" disabled>
                  <i class="fa fa-edit"></i> Ver
                </button>
                <button class="btn btn-app" id="btnUnir" type="submit" name="accion" value="unir" disabled>
                  <i class="fa fa-chain"></i> Unir
                </button>
                <button class="btn btn-app " id="btnSeparar" type="submit" name="accion" value="separar" disabled>
                  <i class="fa fa-unlink"></i> Separar
                </button>
                <!-- borrar no es algo que se deba hacer desde los tickets..
                <button class="btn btn-app " id="btnBorrar" data-toggle="modal" data-target="#myModal"  name="accion" value="borrarr" disabled>
                  <i class="fa fa-trash"></i> Borrar
                </button>
                -->
                <!-- Modal para Borrar-->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar Tickets </h4></h4>
                      </div>
                      <div class="modal-body">
                        <p>Esta acción eliminará los tickets seleccionados. ¿Esta seguro que desea continuar?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn btn-danger" id="confirmaBorrado" data-dismiss="modal" type= submit name="accion" value="borrar">Si, estoy seguro.</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No, llévame a donde estaba.</button>
                      </div>
                    </div>
                
                  </div>
                </div> <!-- End Modal Content -->
                
                
                
                
          </div><!-- /.box-body -->
        </div>
        <!-- /1 box --> 
        
        
        <table id="grilla" class="display">
          <thead>
              <tr>
                  <th><input type="checkbox" id="checkAll" onclick="checkAll(this)"></input></th>
                  <th><small class="label glyphicon glyphicon-flag bg-olive"> </small></th>
                  <th>#</th>
                  <th>Asunto</th>
                  <th>Estado</th>
                  <th>Usuario/Operador</th>
                  <th>Asignado</th>
                  <th>Departamento</th>
                  <th>SLA</th>
                  <th>Vencimiento</th>
              </tr>
          </thead>
          <tbody>
              {foreach from=$Tickets item=ticket}
                  <tr>
                      <td><input class="case" type="checkbox" name="ticketId[]" value="{$ticket->getTicketId()}"></input></td>
                      <td><small class="label glyphicon glyphicon-flag" style='color:{$ticket->getPrioridad()->getColor()}'> </small><br><small>{$ticket->getPrioridad()->getNombre()}</small></td>
                      <td>{$ticket->getNumeroTicket()}</td>
                      <td>{$ticket->getAsunto()}</td>
                      <td><small class="label " style='color:{$ticket->getEstado()->getColor()}'>{$ticket->getEstado()->getNombre()}</small></td>
                      <td>{if $ticket->getUsuario() == null}
                            <small class="label bg-olive">Operador: </small><br>
                            {$ticket->getOperador()->getEmail()} <br>
                            {$ticket->getOperador()->getNombre()}<br>
                            <!--<Small>{$ticket->getOperador()->getEmail()}</Small> -->
                          {else}
                            <small class="label bg-blue">Usuario: </small><br>
                            {$ticket->getUsuario()->getEmail()} <br>
                            {$ticket->getUsuario()->getNombre()}<br>
                            <!--<Small>{$ticket->getUsuario()->getEmail()}</Small> -->
                          {/if}
                      </td>
                      <td>{if $ticket->getAsignadoAOperador()}
                              {$ticket->getAsignadoAOperador()->getNombreUsuario()}<br> <Small>{$ticket->getAsignadoAOperador()->getNombreUsuario()}</Small><br><small>{$ticket->getAsignadoAOperador()->getEmail()}</small>
                          {/if}    
                      </td>
                      <td>{$ticket->getDepartamento()->getNombre()}</td>
                      <td>Por Defecto</td>
                      <td>{$ticket->getFechaVto()|date_format:"%D, %H:%M"}</td>
                  </tr>
              {/foreach}
          </tbody>
        </table>
      </form>
 
    </section>
    <!-- /.content -->
    {if $Error}{$Error->getHtmlModal()}{/if}
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

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
<!-- Manejador de botones y Checkbox-->
<script type="text/javascript" charset="utf8" src="{$rutaJS}chkboxManager.js"></script>
<script type="text/javascript" charset="utf8" src="{$rutaJS}checkAll.js"></script>
<!-- Borrado Modal-->
<script type="text/javascript" charset="utf8" src="{$rutaJS}borradoModal.js"></script>


<!-- DataTables -->

<script type="text/javascript" charset="utf8" src="{$rutaJS}jquery.dataTables.js"></script>

<script src="{$rutaJS}tmh-error.js"></script>
{literal}

<script>
$(document).ready( function () {
    $('#grilla').DataTable({
  "columnDefs": [
    { "width": "5px", "targets": 0 },
    { "width": "5px", "targets": 1 },
    { "width": "7px", "targets": 2 },
    { "width": "7px", "targets": 4 }
  ]
});
} );
</script>
{/literal}

<!-- AdminLTE for demo purposes -->
<script src="{$rutaJS}demo.js"></script>

{include file='footer.tpl'}