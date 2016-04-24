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
        Usuarios
        <small>Altas - Modificaciones - Bajas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/operador.php?modulo=dashboard"><i class="fa fa-dashboard"></i> Usuarios</a></li>
        <li class="active">Lista Usuarios</li>
      </ol>
    </section>
   <!-- /Content Header (Page header) -->  
   
   <!-- CONTENIDO -->
    <section class="content">
      <!-- 1 box Largo --> 
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Acciones:</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /.box-tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            
            
              <button class="btn btn-app " id="btnNuevo" onclick="window.location.href='/operador.php?modulo=nuevoUsuario'">
                <i class="fa fa-plus"></i> Nuevo
              </button>
              
              <button class="btn btn-app" id="btnModificar" onclick="window.location.href='/operador.php?modulo=modificarUsuario'" disabled>
                <i class="fa fa-edit"></i> Editar
              </button>
              
              <button class="btn btn-app" id="btnBorrar" data-toggle="modal" data-target="#myModal" disabled>
                <i class="fa fa-trash"></i> Borrar
              </button>
              
              <!-- Modal para Borrar-->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
              
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Eliminar Usuario</h4></h4>
                    </div>
                    <div class="modal-body">
                      <p>Esta acción eliminará los usuarios seleccionados. ¿Esta seguro que desea continuar?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn btn-danger" data-dismiss="modal">Si, estoy seguro.</button>
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
                <th><input type="checkbox"></input></th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Empresa</th>
                <th>Activo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" onclick="manejoBotonPrueba(this)"></input></td>
                <td>Br1ann</td>
                <td>Brian</td>
                <td>Ducca</td>
                <td>Brian.ducca@gmail.com</td>
                <td>T.M.H.</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>lbockor</td>
                <td>Lucas Daniel</td>
                <td>Bockor</td>
                <td>Lbockor@gmail.com</td>
                <td>T.M.H.</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>lkdml</td>
                <td>Mariano</td>
                <td>López Senés</td>
                <td>marianolopezsenes@gmail.com</td>
                <td>T.M.H.</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>glopez</td>
                <td>Gasón</td>
                <td>López</td>
                <td>glopez@gmail.com</td>
                <td>sadaic sa</td>
                <td>no</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>gperez</td>
                <td>Gerardo</td>
                <td>perez</td>
                <td>gperez@hotmail.com</td>
                <td></td>
                <td>no</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>gperez</td>
                <td>Walter</td>
                <td>cassin</td>
                <td>wcassin@elmetro.com.ar</td>
                <td>El Metro</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>rsalcedo</td>
                <td>Ricadro</td>
                <td>Salcedo</td>
                <td>rsalcedo@elmetro.com.ar</td>
                <td>El Metro</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>vtomada</td>
                <td>Victoria</td>
                <td>Tomada</td>
                <td>vtomada@elmetro.com.ar</td>
                <td>El Metro</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>Sgonzales</td>
                <td>Sofia</td>
                <td>Gonzalez</td>
                <td>sgonzales@elmetro.com.ar</td>
                <td>El Metro</td>
                <td>si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>Valeria</td>
                <td>Valeria</td>
                <td>ottero</td>
                <td>valeria.ottero@nestle.com</td>
                <td>nestle S.A.</td>
                <td>Si</td>
            </tr>
            <tr>
                <td><input type="checkbox"></input></td>
                <td>Cvaldon</td>
                <td>Carlos</td>
                <td>valdon</td>
                <td>cvaldon@nestle.com</td>
                <td>nestle S.A.</td>
                <td>Si</td>
            </tr>
            
        </tbody>
    </table>

 
    </section>
    <!-- /.content -->
    
  </div>
 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- prueba manejo de boton -->
<!-- TODO: Terminar script para manejo por rows -->

<script>

function manejoBotonPrueba(checkbox)
{
  
 
    if (checkbox.checked)
    {
    document.getElementById("btnModificar").disabled = false;
    document.getElementById("btnBorrar").disabled = false;
    document.getElementById("btnNuevo").disabled = true;
    }
    if (checkbox.checked == false)
    {
    document.getElementById("btnModificar").disabled = true;
    document.getElementById("btnBorrar").disabled = true;
    document.getElementById("btnNuevo").disabled = false;
    }
    
}

</script>


<!-- prueba manejo de boton -->

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